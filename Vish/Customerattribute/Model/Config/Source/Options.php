<?php

namespace Onecreations\Customertesaccnumber\Model\Config\Source;

use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
use Magento\Framework\DB\Ddl\Table;

class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

public function getAllOptions()
{
     $this->_options=[ 
      ['label'=>'Select Options', 'value'=>''],
                        ['label'=>'Option1', 'value'=>'First Option Value']
                       ['label'=>'Option2', 'value'=>'Second Option Value']
                       ['label'=>'Option3', 'value'=>'Third Option Value']


                     ];
     return $this->_options;
}

/**
 * Get a text for option value
 *
 * @param string|integer $value
 * @return string|bool
 */
public function getOptionText($value)
{
    foreach ($this->getAllOptions() as $option) {
        if ($option['value'] == $value) {
            return $option['label'];
        }
    }
    return false;
}

/**
 * Retrieve flat column definition
 *
 * @return array
 */
public function getFlatColumns()
{
    $attributeCode = $this->getAttribute()->getAttributeCode();
    return [
        $attributeCode => [
            'unsigned' => false,
            'default' => null,
            'extra' => null,
            'type' => Table::TYPE_INTEGER,
            'nullable' => true,
            'comment' => 'Custom Attribute Options  ' . $attributeCode . ' column',
        ],
    ];
}
}
