package main

import (
	"fmt"
	"github.com/joho/godotenv"
	"log"
	"net/http"
	"os"
)

func init() {
	err := godotenv.Load()
	if err != nil {
		log.Fatal("Error loading .env file")
	}
}

func main() {
	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		fmt.Fprintf(w, "Hello from service version 2")
	})

	log.Println(
		fmt.Sprintf("service version 2 started on port:%s ...", os.Getenv("APP_PORT")),
	)

	err := http.ListenAndServe(fmt.Sprintf(":%s", os.Getenv("APP_PORT")), nil)
	if err != nil {
		log.Println(err)
	}
}
