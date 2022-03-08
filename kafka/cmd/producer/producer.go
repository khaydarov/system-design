package main

import (
	"context"
	"fmt"
	"github.com/segmentio/kafka-go"
	"log"
)

func logf(msg string, a ...interface{}) {
	fmt.Println(msg, a)
}

func produceMessage() {
	w := &kafka.Writer{
		Addr: kafka.TCP("localhost:29093"),
		Topic: "my-topic",
		ErrorLogger: kafka.LoggerFunc(logf),
	}

	err := w.WriteMessages(context.Background(),
		kafka.Message{
			Key:   []byte("Key-A"),
			Value: []byte("Hello World!"),
		},
		kafka.Message{
			Key:   []byte("Key-B"),
			Value: []byte("One!"),
		},
		kafka.Message{
			Key:   []byte("Key-C"),
			Value: []byte("Two!"),
		},
	)
	if err != nil {
		log.Fatal("failed to write messages:", err)
	}

	if err := w.Close(); err != nil {
		log.Fatal("failed to close writer:", err)
	}
}

func main() {
	produceMessage()
}
