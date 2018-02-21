<?php


namespace Vish\Customerattribute\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;

class InstallData implements InstallDataInterface
{

    private $customerSetupFactory;

    /**
     * Constructor
     *
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $customerSetup = $objectManager->create('Magento\Customer\Setup\CustomerSetup');

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'customerattributex', [
            'type' => 'varchar',
            'label' => 'My Custom Attribute',
            'input' => 'text',

            
            'source' => 'Magento\Customer\Model\Customer\Attribute\Source\Group',
            'required' => false,
            'visible' => true,
            'position' => 333,
            'system' => false,
            'backend' => ''
        ]);

        
        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'customerattributex')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout'
            ]]);
        $attribute->save();
    }
}
