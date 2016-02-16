<?php

/**
 * Class SortTest
 */
class SortTest extends TestCase
{
    /**
     * A test if the Api returns the input in numerical order.
     *
     * @return void
     */
    public function testOutputIsBubbleSorted()
    {
        $this->post('/sort/api/v1/bubble', ['input' => [23,1,3,4,2,7,1,4,5]]);
        $this->receiveJson(['input' => [23,1,3,4,2,7,1,4,5], 'output' => [1,1,2,3,4,4,5,7,23]]);

        $this->post('/sort/api/v1/bubble', ['input' => [1,1,2,1,1]]);
        $this->receiveJson(['input' => [1,1,2,1,1], 'output' => [1,1,1,1,2]]);

        $this->post('/sort/api/v1/bubble', ['input' => [1,2,3,4,5]]);
        $this->receiveJson(['input' => [1,2,3,4,5], 'output' => [1,2,3,4,5]]);

        $this->post('/sort/api/v1/bubble', ['input' => [5,4,3,2,1]]);
        $this->receiveJson(['input' => [5,4,3,2,1], 'output' => [1,2,3,4,5]]);
    }

    /**
     * A test if the Api returns a error if the input is not numerical or array.
     *
     * @return void
     */
    public function testErrorIfInputIsInvalid()
    {
        $this->post('/sort/api/v1/bubble', ['input' => ['a',1,2,'b']]);
        $this->receiveJson(['input' => ['a',1,2,'b'],
            'errors' =>
                [['field' => 'input.0',
                'message' => 'The input.0 must be a number.'],
                ['field' => 'input.3',
                'message' => 'The input.3 must be a number.']]]);

        $this->post('/sort/api/v1/bubble', ['input' => 'a']);
        $this->receiveJson(['input' => 'a',
            'errors' =>
                [['field' => 'input', 'message' => 'The input must be an array.']]]);
    }
}
