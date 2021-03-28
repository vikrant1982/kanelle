<?php

namespace Commercepundit\Megamenu\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateSalable extends Command {

    protected $_storeManager;

    protected $directoryList;

    protected $ioFile;

  

    protected $category_array = ['3' => '30'];
    protected $categoryLinkRepository;
    protected $_productCollectionFactory;
    protected $categoryLinkManagementInterface;
    protected $categoryRepository;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList,
        \Magento\Framework\Filesystem\Io\File $ioFile,
        \Magento\Catalog\Model\CategoryLinkRepository $categoryLinkRepository,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Api\CategoryLinkManagementInterface $categoryLinkManagementInterface,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepositoryInterface
    ) {       

        $this->_storeManager = $storeManager;
        $this->directoryList    = $directoryList;
        $this->ioFile           = $ioFile;
        $this->categoryLinkRepository = $categoryLinkRepository;
        $this->categoryLinkManagementInterface = $categoryLinkManagementInterface;
        $this->categoryRepository = $categoryRepositoryInterface;
        parent::__construct();
        
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName('megamenu:create')
            ->setDescription('Creating Sala product');
        parent::configure();
    }


    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return null|int null or 0 if everything went fine, or an error code
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Start</info>');

        $output->writeln('<info>Removing Old Sales Product...</info>');
        $this->unassignedProductFromCategory(30);
        
        $output->writeln('<info>Creating Sales Product...</info>');
        $this->assignProductToCategories();
        $output->writeln('<info>End</info>'); 
        return 0;
    }

    private function assignProductToCategories(){
        $specialCollections = $this->getSpecialProductByCategories();
        foreach($specialCollections as $specialCollection){
            $this->categoryRepository->assignProductToCategories($specialCollection->getSku(), 30);
        }

   
        
    }

    

    private function unassignedProductFromCategory($categoryId)
    {  

        try {
            $pCollections = $this->getProductCollectionByCategories($categoryId);
            foreach($pCollections as $pCollection){
                $this->categoryLinkRepository->deleteByIds($categoryId, $pCollection->getSku());
            }
 
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }      
        
    }


    public function mapCategory($id){
        return $category_array[$id];

    }


    public function getProductCollectionByCategories($ids)
    {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => ids]);
        return $collection;
    }

    public function getSpecialProductByCategories(){
        $count = $this->getProductCount();
        $category_id = $this->getData("category_id");
        $collection = clone $this->_productCollectionFactory();
        $collection ->clear() ->getSelect() ->reset(\Magento\Framework\DB\Select::WHERE)->reset(\Magento\Framework\DB\Select::ORDER)
            ->reset(\Magento\Framework\DB\Select::LIMIT_COUNT)
            ->reset(\Magento\Framework\DB\Select::LIMIT_OFFSET)
            ->reset(\Magento\Framework\DB\Select::GROUP);
        if (!$category_id) 
        {
            $category_id = $this->_storeManager->getStore()->getRootCategoryId();
        }
        $category = $this->categoryRepository->get($category_id);
        $now = date('Y-m-d');
        if (isset($category) && $category) 
        {
            $collection->addMinimalPrice() ->addFinalPrice()
                ->addTaxPercents()->addAttributeToSelect('name')
                ->addAttributeToFilter('special_price', ['neq' => ''])
                ->addAttributeToFilter([['attribute' => 'special_from_date',
                'lteq' => date('Y-m-d G:i:s', strtotime($now)),
                'date' => true, ], 
                    ['attribute' => 'special_to_date',
                    'gteq' => date('Y-m-d G:i:s', strtotime($now)), 'date' => true,]])
                    ->addAttributeToFilter('is_saleable', 1, 'left');
        } 
        else 
        {
            $collection->addMinimalPrice() ->addFinalPrice()
                ->addTaxPercents() ->addAttributeToSelect('*')
                ->addAttributeToFilter('special_price', ['neq' => ''])
                ->addAttributeToSelect('special_from_date')
                ->addAttributeToSelect('special_to_date')
                ->addAttributeToFilter([['attribute' => 'special_from_date',
                'lteq' => date('Y-m-d G:i:s', strtotime($now)),
                'date' => true, ], ['attribute' => 'special_to_date',
                'gteq' => date('Y-m-d G:i:s', strtotime($now)),
                'date' => true,]])
                ->addAttributeToFilter('is_saleable', 1, 'left');
        }
        $collection->getSelect() ->limit($count);
        return $collection;

    }

   

    public function getProductCount(){
        $limit = $this->getData("product_count");
        if (!$limit)
            $limit = 10;
        return $limit;
    }

}
