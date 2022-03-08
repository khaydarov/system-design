package main

import (
	"context"
	"fmt"
	"github.com/segmentio/kafka-go"
	"log"
)

func main() {
	consumeMessages()
}

func consumeMessages() {
	r := kafka.NewReader(kafka.ReaderConfig{
		Brokers: []string{"localhost:29093", "localhost:39093"},
		Topic: "my-topic",
		GroupID: "consumer-group-1",
		//Partition: 2,
		MinBytes: 10, // 10 bytes
		MaxBytes: 100, // 100 bytes
	})

	ctx := context.Background()
	fmt.Println("Listening...")
	for {
		m, err := r.ReadMessage(ctx)
		if err != nil {
			fmt.Println(err)
			break
		}
		fmt.Printf("message at offset %d: %s = %s\n", m.Offset, string(m.Key), string(m.Value))
	}

	if err := r.Close(); err != nil {
		log.Fatal("failed to close reader:", err)
	}
}


