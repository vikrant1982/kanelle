<?php

namespace Commercepundit\MegaMenu\Console\Command;

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
    protected $collection;
    protected $_configurable;

    public function __construct(
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList,
        \Magento\Framework\Filesystem\Io\File $ioFile,
        \Magento\Catalog\Model\CategoryLinkRepository $categoryLinkRepository,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Api\CategoryLinkManagementInterface $categoryLinkManagementInterface,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepositoryInterface,
        \Magento\Catalog\Model\ResourceModel\Product\Collection $collection,
        \Magento\ConfigurableProduct\Model\ResourceModel\Product\Type\Configurable $configurable
    ) {       

        $this->_storeManager = $storeManager;
        $this->directoryList    = $directoryList;
        $this->ioFile           = $ioFile;
        $this->categoryLinkRepository = $categoryLinkRepository;
        $this->categoryLinkManagementInterface = $categoryLinkManagementInterface;
        $this->categoryRepository = $categoryRepositoryInterface;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->collection = $collection;
        $this->_configurable = $configurable;
        parent::__construct();
        
    }

    /**
     * {@inheritdoc}
     */
    protected function configure(){
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
    protected function execute(InputInterface $input, OutputInterface $output){
        $output->writeln('<info>Start</info>');

        $output->writeln('<info>Removing Old Sales Product...</info>');
        $this->unassignedProductFromCategory(30);
        
        $output->writeln('<info>Creating Sales Product...</info>');
        $this->assignProductToCategories();
        $output->writeln('<info>End</info>'); 
        return 0;
    }

    private function assignProductToCategories(){
        $Ids = $this->getSpecialProductByCategories();
        foreach($Ids as $id){
            $product = $this->_productCollectionFactory->create()->load($id);
            $this->categoryLinkManagementInterface->assignProductToCategories($product->getSku(), array('30'));
        }

   
        
    }

    

    private function unassignedProductFromCategory($categoryId){  

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


    public function getProductCollectionByCategories($ids){
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoriesFilter(['in' => $ids]);
        return $collection;
    }

    public function getSpecialProductByCategories(){
        $Ids = array();
         $collection->addAttributeToSelect('*')
                ->addAttributeToFilter('special_price', ['neq' => ''])
                ->addAttributeToFilter('is_saleable', 1, 'left');
        $productCol = $collection->getSelect();

        foreach($productCol as $product){
            $confId = $this->_configurable->getParentIdsByChild($product->getId());
           if($confId){
            $Ids[] = $confId;
           } else {
               $Ids[] = $product->getId();
           }

        }

        return array_unique($Ids); 

    }


}
