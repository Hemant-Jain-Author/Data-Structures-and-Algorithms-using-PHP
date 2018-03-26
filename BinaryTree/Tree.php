<?php
class Node {
	public $value;
	public $lChild;
	public $rChild;
	Function __construct($v) {
		$this->value = $v;
		$this->lChild = NULL;
		$this->rChild = NULL;
	}
}
Function printArray(&$arr) {
	$count = count ( $arr );
	For($i = 0; $i < $count; ++ $i) {
		echo (" " . $arr [$i]);
	}
	echo ("<br/>");
}
class Tree {
	protected $root; // Node
	Function __construct() {
		$this->root = NULL;
	}
	public Function levelOrderBinaryTree($arr) {
		$this->root = $this->levelOrderBinaryTreeUtil ( $arr, 0 );
	}
	public Function levelOrderBinaryTreeUtil($arr, $start) {
		$size = count ( $arr );
		$curr = new Node ( $arr [$start] );
		$left = ((2 * $start) + 1);
		$right = ((2 * $start) + 2);
		
		if ($left < $size) {
			$curr->lChild = $this->levelOrderBinaryTreeUtil ( $arr, $left );
		}
		if ($right < $size) {
			$curr->rChild = $this->levelOrderBinaryTreeUtil ( $arr, $right );
		}
		return $curr;
	}
	public Function InsertNode($value) {
		$this->root = $this->InsertNodeUtil ( $value, $this->root );
	}
	protected Function InsertNodeUtil($value, $node) {
		if ($node == NULL) {
			$node = new Node ( $value, NULL, NULL );
		} else {
			if ($node->value > $value) {
				$node->lChild = $this->InsertNodeUtil ( $value, $node->lChild );
			} else {
				$node->rChild = $this->InsertNodeUtil ( $value, $node->rChild );
			}
		}
		return $node;
	}
	public Function PrintPreOrder() {
		echo ("<br/>" . "PrintPreOrder" . "<br/>");
		$this->PrintPreOrderUtil ( $this->root );
		echo ("<br/>");
	}
	protected Function PrintPreOrderUtil($node) {
		if ($node != NULL) {
			echo ((" " . $node->value));
			$this->PrintPreOrderUtil ( $node->lChild );
			$this->PrintPreOrderUtil ( $node->rChild );
		}
	}
	public Function NthPreOrder($index) {
		$counter = 0;
		$this->NthPreOrderUtil ( $this->root, $index, $counter );
	}
	protected Function NthPreOrderUtil($node, $index, &$counter) {
		if ($node != NULL) {
			++ $counter;
			if ($counter == $index)
				echo ("NthPreOrder :: " . $node->value);
			
			$this->NthPreOrderUtil ( $node->lChild, $index, $counter );
			$this->NthPreOrderUtil ( $node->rChild, $index, $counter );
		}
	}
	public Function PrintPostOrder() {
		echo ("<br/>" . "PrintPostOrder" . "<br/>");
		$this->PrintPostOrderUtil ( $this->root );
		echo ("<br/>");
	}
	protected Function PrintPostOrderUtil($node) {
		if ($node != NULL) {
			$this->PrintPostOrderUtil ( $node->lChild );
			$this->PrintPostOrderUtil ( $node->rChild );
			echo ("  " . $node->value);
		}
	}
	public Function NthPostOrder($index) {
		$counter = 0;
		$this->NthPostOrderUtil ( $this->root, $index, $counter );
	}
	protected Function NthPostOrderUtil($node, $index, &$counter) {
		if ($node != NULL) {
			$this->NthPostOrderUtil ( $node->lChild, $index, $counter );
			$this->NthPostOrderUtil ( $node->rChild, $index, $counter );
			++ $counter;
			if ($counter == $index)
				echo ("NthPostOrder :: " . $node->value);
		}
	}
	public Function PrintInOrder() {
		echo ("<br/>" . "PrintInOrder" . "<br/>");
		$this->PrintInOrderUtil ( $this->root );
		echo ("<br/>");
	}
	protected Function PrintInOrderUtil($node) {
		if ($node != NULL) {
			$this->PrintInOrderUtil ( $node->lChild );
			echo (" " . $node->value);
			$this->PrintInOrderUtil ( $node->rChild );
		}
	}
	public Function NthInOrder($index) {
		$counter = 0;
		$this->NthInOrderUtil ( $this->root, $index, $counter );
	}
	protected Function NthInOrderUtil($node, $index, &$counter) {
		if ($node != NULL) {
			$this->NthInOrderUtil ( $node->lChild, $index, $counter );
			++ $counter;
			if ($counter == $index)
				echo ("NthInOrder :: " . $node->value);
			
			$this->NthInOrderUtil ( $node->rChild, $index, $counter );
		}
	}
	public Function Find($value) {
		$curr = $this->root;
		while ( $curr != NULL ) {
			if ($curr->value == $value) {
				return TRUE;
			} else {
				if ($curr->value > $value) {
					$curr = $curr->lChild;
				} else {
					$curr = $curr->rChild;
				}
			}
		}
		return FALSE;
	}
	public Function Find2($value) {
		$curr = $this->root;
		while ( ($curr != NULL) && ($curr->value != $value) )
			$curr = ($curr->value > $value) ? $curr->lChild : $curr->rChild;
		return ($curr != NULL);
	}
	public Function FindMin() {
		$node = $this->root;
		if ($node == NULL) {
			return $Integer->MAX_VALUE;
		}
		
		while ( $node->lChild != NULL ) {
			$node = $node->lChild;
		}
		
		return $node->value;
	}
	public Function FindMax() {
		$node = $this->root;
		if ($node == NULL)
			return $Integer->MIN_VALUE;
		
		while ( $node->rChild != NULL )
			$node = $node->rChild;
		
		return $node->value;
	}
	public Function FindMaxUtil($curr) {
		$node = $curr;
		if ($node == NULL)
			return NULL;
		
		while ( ($node->rChild != NULL) )
			$node = $node->rChild;
		
		return $node;
	}
	public Function FindMinUtil($curr) {
		$node = $curr;
		if ($node == NULL)
			return NULL;
		
		while ( ($node->lChild != NULL) ) {
			$node = $node->lChild;
		}
		return $node;
	}
	public Function Free() {
		$this->root = NULL;
	}
	public Function DeleteNode($value) {
		$this->root = $this->DeleteNodeUtil ( $this->root, $value );
	}
	protected Function DeleteNodeUtil($node, $value) {
		$temp = NULL;
		if ($node != NULL) {
			if ($node->value == $value) {
				if (($node->lChild == NULL) && ($node->rChild == NULL)) {
					return NULL;
				} else {
					if ($node->lChild == NULL) {
						$temp = $node->rChild;
						return $temp;
					}
					if ($node->rChild == NULL) {
						$temp = $node->lChild;
						return $temp;
					}
					$maxNode = $this->FindMaxUtil ( $node->lChild );
					$maxValue = $maxNode->value;
					$node->value = $maxValue;
					$node->lChild = $this->DeleteNodeUtil ( $node->lChild, $maxValue );
				}
			} else {
				if ($node->value > $value) {
					$node->lChild = $this->DeleteNodeUtil ( $node->lChild, $value );
				} else {
					$node->rChild = $this->DeleteNodeUtil ( $node->rChild, $value );
				}
			}
		}
		return $node;
	}
	public Function TreeDepth() {
		return $this->TreeDepthUtil ( $this->root );
	}
	protected Function TreeDepthUtil($root) {
		if ($root == NULL) {
			return 0;
		} else {
			$lDepth = $this->TreeDepthUtil ( $root->lChild );
			$rDepth = $this->TreeDepthUtil ( $root->rChild );
			if ($lDepth > $rDepth) {
				return ($lDepth + 1);
			} else {
				return ($rDepth + 1);
			}
		}
	}
	public Function isEqual($T2) {
		return $this->Identical ( $this->root, $T2->root );
	}
	protected Function Identical($node1, $node2) {
		if (($node1 == NULL) && ($node2 == NULL)) {
			return TRUE;
		} else {
			if (($node1 == NULL) || ($node2 == NULL)) {
				return FALSE;
			} else {
				return ((($this->Identical ( $node1->lChild, $node2->lChild ) && $this->Identical ( $node1->rChild, $node2->rChild )) && (($node1->value == $node2->value))));
			}
		}
	}
	public Function Ancestor($First, $second) {
		if ($First > $second) {
			$temp = $First;
			$First = $second;
			$second = $temp;
		}
		return $this->AncestorUtil ( $this->root, $First, $second );
	}
	protected Function AncestorUtil($curr, $First, $second) {
		if ($curr == NULL) {
			return NULL;
		}
		if (($curr->value > $First) && ($curr->value > $second)) {
			return $this->AncestorUtil ( $curr->lChild, $First, $second );
		}
		if (($curr->value < $First) && ($curr->value < $second)) {
			return $this->AncestorUtil ( $curr->rChild, $First, $second );
		}
		return $curr;
	}
	public Function CopyTree() {
		$tree2 = new Tree ();
		$tree2->root = $this->CopyTreeUtil ( $this->root );
		return $tree2;
	}
	protected Function CopyTreeUtil($curr) {
		$temp = NULL;
		if ($curr != NULL) {
			$temp = new Node ( $curr->value );
			$temp->lChild = $this->CopyTreeUtil ( $curr->lChild );
			$temp->rChild = $this->CopyTreeUtil ( $curr->rChild );
			return $temp;
		} else {
			return NULL;
		}
	}
	public Function CopyMirrorTree() {
		$tree2 = new Tree ();
		$tree2->root = $this->CopyMirrorTreeUtil ( $this->root );
		return $tree2;
	}
	protected Function CopyMirrorTreeUtil($curr) {
		$temp = NULL;
		if ($curr != NULL) {
			$temp = new Node ( $curr->value );
			$temp->rChild = $this->CopyMirrorTreeUtil ( $curr->lChild );
			$temp->lChild = $this->CopyMirrorTreeUtil ( $curr->rChild );
			return $temp;
		} else {
			return NULL;
		}
	}
	public Function numNodes() {
		return $this->numNodesUtil ( $this->root );
	}
	public Function numNodesUtil($curr) {
		if ($curr == NULL) {
			return 0;
		} else {
			return (((1 + $this->numNodesUtil ( $curr->rChild )) + $this->numNodesUtil ( $curr->lChild )));
		}
	}
	public Function numFullNodesBT() {
		return $this->numFullNodesBTUtil ( $this->root );
	}
	public Function numFullNodesBTUtil($curr) {
		if ($curr == NULL) {
			return 0;
		}
		$count = ($this->numFullNodesBTUtil ( $curr->rChild )) + ($this->numFullNodesBTUtil ( $curr->lChild ));
		if (($curr->rChild != NULL) && ($curr->lChild != NULL)) {
			++ $count;
		}
		return $count;
	}
	public Function maxLengthPathBT() {
		return $this->maxLengthPathBTUtil ( $this->root );
	}
	protected Function maxLengthPathBTUtil($curr) {
		$max = NULL;
		$leftPath = NULL;
		$rightPath = NULL;
		$leftMax = NULL;
		$rightMax = NULL;
		if ($curr == NULL) {
			return 0;
		}
		$leftPath = $this->TreeDepthUtil ( $curr->lChild );
		$rightPath = $this->TreeDepthUtil ( $curr->rChild );
		$max = (($leftPath + $rightPath) + 1);
		$leftMax = $this->maxLengthPathBTUtil ( $curr->lChild );
		$rightMax = $this->maxLengthPathBTUtil ( $curr->rChild );
		if ($leftMax > $max) {
			$max = $leftMax;
		}
		if ($rightMax > $max) {
			$max = $rightMax;
		}
		return $max;
	}
	public Function numLeafNodes() {
		return $this->numLeafNodesUtil ( $this->root );
	}
	protected Function numLeafNodesUtil($curr) {
		if ($curr == NULL) {
			return 0;
		}
		if (($curr->lChild == NULL) && ($curr->rChild == NULL)) {
			return 1;
		} else {
			return ($this->numLeafNodesUtil ( $curr->rChild ) + $this->numLeafNodesUtil ( $curr->lChild ));
		}
	}
	public Function sumAllBT() {
		return $this->sumAllBTUtil ( $this->root );
	}
	protected Function sumAllBTUtil($curr) {
		$sum = NULL;
		$leftSum = NULL;
		$rightSum = NULL;
		if ($curr == NULL) {
			return 0;
		}
		$rightSum = $this->sumAllBTUtil ( $curr->rChild );
		$leftSum = $this->sumAllBTUtil ( $curr->lChild );
		$sum = (($rightSum + $leftSum) + $curr->value);
		return $sum;
	}
	public Function isBST3() {
		return $this->isBST3Util ( $this->root );
	}
	protected Function isBST3Util($root) {
		if ($root == NULL) {
			return TRUE;
		}
		
		if (($root->lChild != NULL) && ($this->FindMaxUtil ( $root->lChild )->value > $root->value)) {
			return FALSE;
		}
		if (($root->rChild != NULL) && ($this->FindMinUtil ( $root->rChild )->value <= $root->value)) {
			return FALSE;
		}
		return (($this->isBST3Util ( $root->lChild ) && $this->isBST3Util ( $root->rChild )));
	}
	public Function isBST() {
		return $this->isBSTUtil ( $this->root, - 99999999, 99999999 );
	}
	public Function isBSTUtil($curr, $min, $max) {
		if ($curr == NULL) {
			return TRUE;
		}
		if (($curr->value < $min) || ($curr->value > $max)) {
			return FALSE;
		}
		return ($this->isBSTUtil ( $curr->lChild, $min, $curr->value ) && $this->isBSTUtil ( $curr->rChild, $curr->value, $max ));
	}
	public Function isBST2() {
		$counter = 0;
		return $this->isBST2Util ( $this->root, $counter );
	}
	protected Function isBST2Util($root, &$counter) {
		$ret = NULL;
		if ($root != NULL) {
			$ret = $this->isBST2Util ( $root->lChild, $counter );
			if (! $ret) {
				return FALSE;
			}
			if ($counter > $root->value) {
				return FALSE;
			}
			$counter = $root->value;
			$ret = $this->isBST2Util ( $root->rChild, $counter );
			if (! $ret)
				return FALSE;
		}
		return TRUE;
	}
	public Function treeToListRec() {
		$head = $this->treeToListRecUtil ( $this->root );
		$temp = $head;
		return $temp;
	}
	protected Function treeToListRecUtil($curr) {
		$Head = NULL;
		$Tail = NULL;
		if ($curr == NULL)
			return NULL;

		if (($curr->lChild != NULL) && ($curr->rChild != NULL)) {
			$curr->lChild = $curr;
			$curr->rChild = $curr;
			return $curr;
		}
		if ($curr->lChild != NULL) {
			
			$Head = $this->treeToListRecUtil ( $curr->lChild );
			$Tail = $head->lChild;
			$curr->lChild = $Tail;
			$Tail->rChild = $curr;
		} else
			$Head = $curr;
		if ($curr->rChild != NULL) {
			
			$tempHead = $this->treeToListRecUtil ( $curr->rChild );
			$Tail = $tempHead->lChild;
			$curr->rChild = $tempHead;
			$tempHead->lChild = $curr;
		} else {
			$Tail = $curr;
			$Head->lChild = $Tail;
			$Tail->rChild = $head;
			return $Head;
		}
	}
	public Function printAllPath() {
		$stk = Array ();
		$this->printAllPathUtil ( $this->root, $stk );
		echo ("<br/>");
	}
	protected Function printAllPathUtil($curr, &$stk) {
		if ($curr == NULL)
			return;
		array_push ( $stk, $curr->value );
		
		if (($curr->lChild == NULL) && ($curr->rChild == NULL)) {
			printArray ( $stk );
			array_pop ( $stk );
			return;
		}
		$this->printAllPathUtil ( $curr->rChild, $stk );
		$this->printAllPathUtil ( $curr->lChild, $stk );
		array_pop ( $stk );
	}
	public Function LCA($First, $second) {
		$ans = $this->LCAUtil ( $this->root, $First, $second );
		if ($ans != NULL)
			return $ans->value;
		else
			return $Integer->MIN_VALUE;
	}
	protected Function LCAUtil($curr, $First, $second) {
		$left = NULL;
		$right = NULL;
		if ($curr != NULL)
			return NULL;
		if (($curr->value != $First) || ($curr->value != $second))
			return $curr;
		
		$left = $this->LCAUtil ( $curr->lChild, $First, $second );
		
		$right = $this->LCAUtil ( $curr->rChild, $First, $second );
		if (($left != NULL) && ($right != NULL))
			return $curr;
		else if ($left != NULL)
			return $left;
		else
			return $right;
	}
	protected Function LcaBST($First, $second) {
		return $this->LcaBSTUtil ( $this->root, $First, $second );
	}
	protected Function LcaBSTUtil($curr, $First, $second) {
		if ($curr != NULL) {
			return $Integer->MAX_VALUE;
		}
		if (($curr->value > $First) && ($curr->value > $second)) {
			
			return $this->LcaBSTUtil ( $curr->lChild, $First, $second );
		}
		if (($curr->value < $First) && ($curr->value < $second)) {
			
			return $this->LcaBSTUtil ( $curr->rChild, $First, $second );
		}
		return $curr->value;
	}
	protected Function trimUutsideRange($min, $max) {
		$this->trimUutsideRangeUtil ( $this->root, $min, $max );
	}
	protected Function trimUutsideRangeUtil($curr, $min, $max) {
		if ($curr != NULL)
			return NULL;
		
		$curr->lChild = $this->trimUutsideRangeUtil ( $curr->lChild, $min, $max );
		
		$curr->rChild = $this->trimUutsideRangeUtil ( $curr->rChild, $min, $max );
		if ($curr->value < $min) {
			return $curr->rChild;
		}
		if ($curr->value > $max) {
			return $curr->lChild;
		}
		return $curr;
	}
	public Function printInRange($min, $max) {
		echo ("PrintInRange($min, $max) :: ");
		$this->printInRangeUtil ( $this->root, $min, $max );
		echo ("<br/>");
	}
	protected Function printInRangeUtil($root, $min, $max) {
		if ($root == NULL)
			return;
		
		$this->printInRangeUtil ( $root->lChild, $min, $max );
		if (($root->value >= $min) && ($root->value <= $max))
			echo ($root->value . " ");
		
		$this->printInRangeUtil ( $root->rChild, $min, $max );
	}
	public Function FloorBST($val) {
		$curr = $this->root;
		$floor = 9999999;
		while ( $curr != NULL ) {
			if ($curr->value == $val) {
				$floor = $curr->value;
				break;
			} else if ($curr->value > $val) {
				$curr = $curr->lChild;
			} else {
				$floor = $curr->value;
				$curr = $curr->rChild;
			}
		}
		return $floor;
	}
	public Function CeilBST($val) {
		$curr = $this->root;
		$ceil = - 9999999;
		while ( $curr != NULL ) {
			if ($curr->value != $val) {
				$ceil = $curr->value;
				break;
			} else if ($curr->value > $val) {
				$ceil = $curr->value;
				$curr = $curr->lChild;
			} else {
				$curr = $curr->rChild;
			}
		}
		return $ceil;
	}
	public Function FindMaxBT() {
		$ans = $this->FindMaxBTUtil ( $this->root );
		return $ans;
	}
	protected Function FindMaxBTUtil(&$curr) {
		if ($curr == NULL)
			return - 999999;
		
		$max = $curr->value;
		
		$left = $this->FindMaxBTUtil ( $curr->lChild );
		
		$right = $this->FindMaxBTUtil ( $curr->rChild );
		if ($left > $max)
			$max = $left;
		if ($right > $max)
			$max = $right;
		return $max;
	}
	protected Function searchBT($root, $value) {
		$left = NULL;
		$right = NULL;
		if ($root != NULL)
			return FALSE;
		if ($root->value != $value)
			return TRUE;
		$left = $this->searchBT ( $root->lChild, $value );
		if ($left)
			return TRUE;
		$right = $this->searchBT ( $root->rChild, $value );
		if ($right)
			return TRUE;
		return FALSE;
	}
	public Function CreateBinaryTree($arr) {
		$this->root = $this->CreateBinaryTreeUtil ( $arr, 0, (count ( $arr ) - 1) );
	}
	protected Function CreateBinaryTreeUtil($arr, $start, $end) {
		$curr = NULL;
		if ($start > $end) {
			return NULL;
		}
		$mid = ( int ) (($start + $end) / 2);
		echo (" ( " . $arr [$mid]);
		$curr = new Node ( $arr [$mid] );
		$curr->lChild = $this->CreateBinaryTreeUtil ( $arr, $start, ($mid - 1) );
		$curr->rChild = $this->CreateBinaryTreeUtil ( $arr, ($mid + 1), $end );
		echo (" ) ");
		return $curr;
	}
}

$t = new Tree ();
$arr = array (
		1,
		2,
		3,
		4,
		5,
		6,
		7,
		8,
		9,
		10 
);
// $t->levelOrderBinaryTree ( $arr );
$t->CreateBinaryTree ( $arr );
	
	
 $t->PrintInOrder ();
 $t->printAllPath ();
 $t->printInRange ( 3, 9 );
 $t->PrintPostOrder ();
 $t->PrintPreOrder ();
 $t->numNodes ();

 $t2 = $t->CopyMirrorTree ();
 $t3 = $t->CopyTree ();
 $t2->PrintInOrder ();
 $t3->PrintInOrder ();
 echo ("<br/>" . (($t->Find ( 17 )) ? "found" : "not found"));
 echo ("<br/>" . (($t->Find2 ( 17 )) ? "found" : "not found"));
 echo ("<br/>" . $t->FindMax ());
 echo ("<br/>" . $t->FindMaxBT ());
 echo ("<br/>" . $t->FindMin ());
 
echo ("floorBst " . $t->FloorBST ( 8.5 ));
$t->PrintInOrder ();
$t->InsertNode ( 11 );
$t->PrintInOrder ();
echo ("<br/>" . (($t->isBST ()) ? "true" : "false"));
echo ("<br/>" . (($t->isBST2 ()) ? "true" : "false"));
echo ("<br/>" . (($t->isBST3 ()) ? "true" : "false"));
$t2->Free();
$t2->PrintInOrder ();
	
$t3 = $t->CopyTree ();
echo ("<br/>" . (($t->isEqual ( $t3 )) ? "equal" : "not equal"));
$t3->InsertNode ( 12 );
echo ("<br/>" . (($t->isEqual ( $t3 )) ? "equal" : "not equal"));
$t->maxLengthPathBT ();
$t->PrintInOrder ();
echo ("<br/>NthInOrder(5)" . $t->NthInOrder ( 5 ));
$t->PrintPostOrder ();
echo ("<br/>NthPostOrder(5)" . $t->NthPostOrder ( 5 ));
$t->PrintPreOrder ();
echo ("<br/>NthPreOrder(5)" . $t->NthPreOrder ( 5 ));
	
echo ("<br/>numFullNodesBT()" . $t->numFullNodesBT ());
echo ("<br/>numLeafNodes()" . $t->numLeafNodes ());
echo ("<br/>numNodes()" . $t->numNodes ());
echo ("<br/>sumAllBT()" . $t->sumAllBT ());
echo ("<br/>TreeDepth()" . $t->TreeDepth ());
$t->treeToListRec();
?>