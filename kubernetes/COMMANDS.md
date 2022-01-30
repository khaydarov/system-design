To create kubectl namespace
```shell
kubectl create namespace myapp
```

Set default namespace
```shell
kubectl config set-context --current --namespace=myapp
```

To build image with defined name and tag from Dockerfile
```shell
docker build -t IMAGENAME .
```

Start container from image, expose port and mount volume
```shell
docker run -d -p 8080:80 -v "$PWD":/usr/src/app IMAGENAME
```

Get inside the POD
```shell
kubectl exec --stdin --tty PODNAME /bin/bash
```

Deployment history
```shell
kubectl rollout history deployment/DEPLOYMENTNAME
```

Update application
```shell
kubectl set image deployment/DEPLOYMENTNAME DEPLOYMENTNAME=IMAGENAME --record
```

Rollback application
```shell
kubectl rollout undo deployment DEPLOYMENTNAME
```

Scale PODS inside DEPLOYMENT
```shell
kubectl scale --replicas=4 deployment/DEPLOYMENTNAME
```