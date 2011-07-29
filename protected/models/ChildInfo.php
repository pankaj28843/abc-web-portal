<?php

/**
 * This is the model class for table "tbl_child_info".
 *
 * The followings are the available columns in table 'tbl_child_info':
 * @property integer $id
 * @property string $child_id
 * @property string $school_id
 * @property integer $class_id
 * @property string $admin_no
 * @property string $sex_id
 * @property string $child_name
 * @property integer $child_status
 */
class ChildInfo extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @return ChildInfo the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_child_info';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('child_id, school_id, class_id, admin_no, sex_id, child_name, child_status', 'required'),
            array('class_id, child_status', 'numerical', 'integerOnly'=>true),
            array('child_id, school_id, admin_no, sex_id, child_name', 'length', 'max'=>128),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, child_id, school_id, class_id, admin_no, sex_id, child_name, child_status', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'child_id' => 'Child',
            'school_id' => 'School',
            'class_id' => 'Class',
            'admin_no' => 'Admin No',
            'sex_id' => 'Sex',
            'child_name' => 'Child Name',
            'child_status' => 'Child Status',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('child_id',$this->child_id,true);
        $criteria->compare('school_id',$this->school_id,true);
        $criteria->compare('class_id',$this->class_id);
        $criteria->compare('admin_no',$this->admin_no,true);
        $criteria->compare('sex_id',$this->sex_id,true);
        $criteria->compare('child_name',$this->child_name,true);
        $criteria->compare('child_status',$this->child_status);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
