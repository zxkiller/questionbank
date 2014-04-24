<?php
App::uses('AppModel', 'Model');
/**
 * Progress Model
 *
 * @property Person $Person
 * @property SubCategory $SubCategory
 */
class Progress extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Person' => array(
			'className' => 'Person',
			'foreignKey' => 'person_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SubCategory' => array(
			'className' => 'SubCategory',
			'foreignKey' => 'sub_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
/*
 * store a progress row in db
 * @param: info of a progress
 */
	public function saveProgress($person_id, $sub_category_id, $progress, $total, $date){
		$this->set(array(
			'person_id' => $person_id,
			'sub_category_id' => $sub_category_id,
			'progress' => $progress,
			'total' => $total,
			'date' => $date));
		$this->save();
	}
/*
 * calculate/update progress for a person, on a test
 * @param: person_id, array of answers on questions
 *		array: questionID => answer of user
 */	
	public function calculateProgress($person_id, $answers){

	}
}
