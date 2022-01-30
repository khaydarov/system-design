package main

import (
    "fmt"
    "html"
    "net/http"
    "os"
)

func main() {
    http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
        fmt.Fprintf(w, "Hello v2, %q, %q, %q", html.EscapeString(r.URL.Path), os.Getenv("APP_CONF_VALUE"), os.Getenv("APP_CONF_SECRET_VALUE"))
    })

    http.ListenAndServe(":8080", nil)
}