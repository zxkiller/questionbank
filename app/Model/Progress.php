<?php
App::uses('AppModel', 'Model');
App::import('Model', 'QuestionsSubcategory');
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
 * get progress for a user
 * @param: personId
 */
	public function getProgresses($person_id){
		return $this->find('all', array(
			'recursive' => 0,
			'conditions' => array(
				'person_id' => $person_id)
			));
	}
/*
 * calculate/update progress for a person, on a test
 * @param: person_id, array of answers on questions
 *		array: questionId => correctNess of user answer
 * Flow:
 * - query to check if it is exist 
 * 		- update if it is in current day
 * 		- insert if it is 
 *			- not exists
 *			- is another day
 */		
	public function calculateProgress($person_id, $questions){
		// iterate given questions array
		// each element is a questionId and correctness of the question
		foreach($questions as $questionId => $correctNess){
			// get subCategories for question
			// equal array(array([QuestionsSubcategory][subcategory_id]))
			$QuestionsSubcategory = new QuestionsSubcategory();

			$subCategories = $QuestionsSubcategory->find('first', array(
	    		'recursive' => -1,
	    		'conditions' => array(
	    			'question_id' => $questionId
	    			)
	    		)
	    	);
			// Iterate each subcategories
			foreach($subCategories as $subCategory){
				// check if row for personID & categoryID exist for today!
				$progressRow = $this->find('first', array(
					'recursive' => 0,
					'conditions' => array(
						'person_id' => $person_id,
						'sub_category_id' => $subCategory['subcategory_id'].'date(date) = \''.date('Y-m-d').'\''
					),
					'order' => array(
						'date DESC'
					)
				));
				// if exits
				if(!empty($progressRow)){
					$currentDate = date('Ymd');
					$dbDate = date('Ymd', strtotime($progressRow['Progress']['date']));

					// equal to current date
					if($currentDate == $dbDate){
						$this->updateAll(
							array(
								'progress' => $progressRow['Progress']['progress'] + $correctNess,
								'total' => $progressRow['Progress']['total'] + 1,
								'date' => "'".date("Y-m-d H:i:s")."'"
							),
							array(
								'person_id' => $person_id,
								'sub_category_id' => $subCategory['subcategory_id']
								)
							);
					}
					// if it is a new day, insert to database
					else{
						$this->set(array(
							'person_id' => $person_id,
							'sub_category_id' => $subCategory['subcategory_id'],
							'progress' => 1,
							'total' => 1,
							'date' => date("Y-m-d H:i:s")));
						$this->save();
					}
				}
				// else it is not exist, insert
				else{
					$this->set(array(
						'person_id' => $person_id,
						'sub_category_id' => $subCategory['subcategory_id'],
						'progress' => 1,
						'total' => 1,
						'date' => date("Y-m-d H:i:s")));
					$this->save();
				}
				
			}
		}

	}
}
