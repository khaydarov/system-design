#### Сборка образа
```shell
docker build -t khaydarov95/otus-task1:v1 .
```

#### Запуск контейнера с приложением
```shell
docker run -d -p 8080:80 -v "$PWD":/usr/src/app khaydarov95/otus-task1:v1
```

#### Зайти в контейнер
```shell
kubectl exec --stdin --tty otus-task1 /bin/bash
```

#### История по deployment
```shell
kubectl rollout history deployment/otus-task1-deployment
```

#### Обновление версии приложения (образа)
```shell
kubectl set image deployment/otus-task1-deployment otus-task1-deployment=khaydarov95/otus-task1 --record
```

#### Откатываение версии приложения (образа)
```shell
kubectl rollout undo deployment otus-task1-deployment
```

#### Скейлинг деплоймента
```shell
kubectl scale --replicas=4 deployment/otus-task1-deployment
```