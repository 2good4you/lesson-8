<?php

//abstract class LinkedList
class LinkedList

{
    public $count = 0;
    /** @var SeparateNode */
    private $head = null;
    private $tail = null;

    // todo use tail

    public function deleteFromHead()
    {
        if (empty($this->head)) {
            throw new RuntimeException("Notice");
        }
        if (!empty($this->head->getNext())) {
            $this->head = $this->head->getNext();
            $prev = $this->head->getPrevious();
            $this->head->setPrevious(null);
            unset($prev);

            --$this->count;
        } else {
            unset($this->head, $this->tail);
            $this->head = $this->tail = null;
            --$this->count;
        }
    }

    public function deleteFromTail()
    {
        if (!empty($this->tail)) {
            if (!empty($this->tail->getPrevious())) {
                echo 123;
                $prelast = $this->tail->getPrevious();
                $prelast->setNext(null);

                unset($this->tail);
                $this->tail = $prelast;
                --$this->count;
            } else {
                unset($this->head, $this->tail);
                $this->tail = $this->head = null;
                --$this->count;
            }

        }
    }

    public function displayAll()
    {
        if (!empty($this->head)) {
            $start = $this->head;
            for ($i = 0; $i < $this->count; $i++) {
                echo $this->head->getValue() . PHP_EOL;
                if (!empty($this->head->getNext())) {
                    $this->head = $this->head->getNext();
                }
            }
            $this->head = $start;
        }
    }

    // todo use tail

    public function insertAfterAt($value, $at)
    {
        $this->setLinkBeforeAfter($value, $at);
    }

    private function setLinkBeforeAfter($value, $at)
    {
        if ($at >= $this->count) {
            $this->append($value);
            return;
        } else if ($at <= 0) {
            $this->prepend($value);
            return;
        }

        $newElement = new SeparateNode();
        $newElement->setValue($value);

        if ($at <= $this->count / 2) {
            $searchigPosition = $this->head;

            for ($i = 1; $i < $at; $i++) {
                $searchigPosition = $searchigPosition->getNext();
            }
            $elementAfterNewInsert = $searchigPosition->getNext();
            $newElement->setNext($elementAfterNewInsert);
            $newElement->setPrevious($searchigPosition);
            $searchigPosition->setNext($newElement);
            $elementAfterNewInsert->setPrevious($newElement);
            ++$this->count;
            return;
        }

        $searchigPosition = $this->tail;
        for ($i = 1, $counter = $this->count - $at; $i <= $counter; $i++) {
            $searchigPosition = $searchigPosition->getPrevious();
        }
        $elementAfterNewInsert = $searchigPosition->getNext();
        $newElement->setNext($elementAfterNewInsert);
        $newElement->setPrevious($searchigPosition);
        $searchigPosition->setNext($newElement);
        $elementAfterNewInsert->setPrevious($newElement);
        ++$this->count;
    }

    public function append($value) //вставка в конец
    {
        $newElement = new SeparateNode();
        $newElement->setValue($value);

        if (!empty($this->tail)) {
            /** @var SeparateNode $lastElement */
            $prelastElement = $this->tail;
            $prelastElement->setNext($newElement);
            $newElement->setPrevious($this->tail);
            $this->tail = $newElement;
        } else {
            $this->tail = $this->head = $newElement;
        }
        ++$this->count;
    }

    public function prepend($value) // вставка в начало
    {
        $newElementHead = new SeparateNode();
        $newElementHead->setValue($value);

        if (!empty($this->head)) {
            /** @var SeparateNode $lastElement */
            $newElementHead->setNext($this->head);
            $this->head->setPrevious($newElementHead);
            $this->head = $newElementHead;

        } else {
            $this->head = $this->tail = $newElementHead;
        }
        ++$this->count;
    }

    public function deleteAt($at)
    {
        $flag = 1;
        if ($at <= $this->count / 2) {
            $nextObject = $this->head;
            do {
                $nextObject = $nextObject->getNext();
            } while ($flag < $at);

            $prev = $nextObject->getPrevious();
            $next = $nextObject->getNext();

            $prev->setNext($nextObject->getNext());
            $next->setPrevious($nextObject->getPrevious);
            unset($nextObject);
            --$this->count;
            return;
        }
    }

    public function search($value)
    {
        $searching = $this->head;

        for ($i = 0; $i < $this->count; $i++){
            if ($searching->getValue() === $value) {
                return $searching;
            }
            $searching = $searching->getNext();
        }


        return null;
    }

    public function insertBeforeAt($value, $at)
    {
        $this->setLinkBeforeAfter($value, $at - 1);
    }

}

