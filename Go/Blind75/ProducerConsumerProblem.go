package main

import (
	"fmt"
	"time"
)

func producer(ch chan<- int, id int) {
	for i := 1; i <= 5; i++ {
		val := i * id
		ch <- val
		fmt.Printf("Producer %d produced %d\n", id, val)
		time.Sleep(200 * time.Millisecond)
	}
}

func consumer(ch <-chan int, id int) {
	for val := range ch {
		fmt.Printf("Consumer %d consumed %d\n", id, val)
		time.Sleep(500 * time.Millisecond)
	}
}

func main() {
	buffer := make(chan int, 5) // shared bounded buffer

	// Start multiple producers
	go producer(buffer, 1)
	go producer(buffer, 2)

	// Start multiple consumers
	go consumer(buffer, 1)
	go consumer(buffer, 2)

	time.Sleep(5 * time.Second)
}

