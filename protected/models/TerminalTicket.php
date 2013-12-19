<?php

/**
 * This is the model class for table "terminal_ticket".
 *
 * The followings are the available columns in table 'terminal_ticket':
 * @property integer $id
 * @property string $batch_no
 * @property string $barcode
 * @property integer $fee
 * @property string $price_paid
 * @property integer $shipping
 * @property string $first_name
 * @property string $last_name
 * @property integer $age
 * @property string $datetime
 * @property integer $created_by
 * @property integer $status
 * @property string $voyage_no
 * @property string $ticket_no
 *
 * The followings are the available model relations:
 * @property TicketStatus $status0
 * @property Fee $fee0
 * @property ShippingCompanies $shipping0
 */
class TerminalTicket extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TerminalTicket the static model class
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
		return 'terminal_ticket';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('datetime', 'required'),
			array('fee, shipping, age, created_by, status', 'numerical', 'integerOnly'=>true),
			array('batch_no', 'length', 'max'=>32),
			array('barcode, first_name, last_name, voyage_no, ticket_no', 'length', 'max'=>100),
			array('price_paid', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, batch_no, barcode, fee, price_paid, shipping, first_name, last_name, age, datetime, created_by, status, voyage_no, ticket_no', 'safe', 'on'=>'search'),
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
			'status0' => array(self::BELONGS_TO, 'TicketStatus', 'status'),
			'fee0' => array(self::BELONGS_TO, 'Fee', 'fee'),
			'shipping0' => array(self::BELONGS_TO, 'ShippingCompanies', 'shipping'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'batch_no' => 'Batch No',
			'barcode' => 'Barcode',
			'fee' => 'Fee',
			'price_paid' => 'Price Paid',
			'shipping' => 'Shipping',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'age' => 'Age',
			'datetime' => 'Datetime',
			'created_by' => 'Created By',
			'status' => 'Status',
			'voyage_no' => 'Voyage No',
			'ticket_no' => 'Ticket No',
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
		$criteria->compare('batch_no',$this->batch_no,true);
		$criteria->compare('barcode',$this->barcode,true);
		$criteria->compare('fee',$this->fee);
		$criteria->compare('price_paid',$this->price_paid,true);
		$criteria->compare('shipping',$this->shipping);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('datetime',$this->datetime,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('status',$this->status);
		$criteria->compare('voyage_no',$this->voyage_no,true);
		$criteria->compare('ticket_no',$this->ticket_no,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}