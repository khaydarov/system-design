Connect to Zookeeper
```shell
zookeeper-shell.sh zookeeper:2181
```

List of connected brokers
```shell
ls /brokers/ids
```

Create new topic
```shell
kafka-topics.sh --bootstrap-server localhost:9092 --create --topic my-topic --partitions 3 --replication-factor 1
```

Create new topic with retention period
```shell
kafka-topics.sh --bootstrap-server localhost:9092 --create --topic test-2 --partitions 3 --replication-factor 1 --config retention.ms=10000 --config segment.ms=10000
```

Topic details
```shell
kafka-topics.sh --bootstrap-server localhost:9092 --topic test-2 --describe
```

Increase number of partitions
```shell
kafka-topics.sh --bootstrap-server localhost:9092 --alter --topic test-2 --partitions 4
```

Show partition offsets of a Kafka topic
```shell
kafka-run-class.sh kafka.tools.GetOffsetShell --broker-list localhost:9092 --topic test-2
```

Delete topic
```shell
kafka-topics.sh --bootstrap-server localhost:9092 --delete --topic test
```

Produce messages
```shell
kafka-console-producer.sh --broker-list localhost:9092 --topic test-2
```

Produce message with key
```shell
kafka-console-producer.sh --broker-list localhost:9092 --topic test-2 --property parse.key=true --property key.separator=:
```

Consume message from topic
```shell
kafka-console-consumer.sh --bootstrap-server localhost:9092 --topic test-2
```

