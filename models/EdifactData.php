<?php

// auto-loading
Yii::setPathOfAlias('EdifactData', dirname(__FILE__));
Yii::import('EdifactData.*');

class EdifactData extends BaseEdifactData
{

    const GateIn = 34;
    const GateOut = 36;
    
    // Add your model-specific methods here. This file will not be overriden by gtc except you force it.
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function init()
    {
        return parent::init();
    }

    public function getItemLabel()
    {
        return parent::getItemLabel();
    }

    public function getmessageTypeLabel()
    {
        switch ($this->messageType) {
            case self::GateIn :
                return 'Gate In';
                break;

            case self::GateOut :
                return 'Gate Out';
                break;

            default:
                break;
        }
        
        return parent::getItemLabel();
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            array()
        );
    }

    public function rules()
    {
        return array_merge(
            parent::rules()
        /* , array(
          array('column1, column2', 'rule1'),
          array('column3', 'rule2'),
          ) */
        );
    }

    public function search($criteria = null)
    {
        if (is_null($criteria)) {
            $criteria = new CDbCriteria;
        }
        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $this->searchCriteria($criteria),
        ));
    }

}
