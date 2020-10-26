<?php
class Solution{
	function levelTraversal($root){
		if($root == NULL)
			return 0;
		else{
			$queue = new SplQueue();
			$queue->enqueue($root);
			while (isset($queue->next)) {
				$value = $queue->current();
				echo $value;
				if($value->left != NULL){
					$queue->enqueue($value->left);
				}
				if($value->right != NULL){
					$queue->enqueue($value->right);
				}
				$queue->dequeue();
			}
		}
	}
}
?>