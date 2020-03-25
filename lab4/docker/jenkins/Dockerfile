FROM jenkins/jenkins:lts

# Install sudo
USER root
RUN apt-get update
RUN apt-get install sudo

RUN apt -y install apt-transport-https lsb-release ca-certificates
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list
RUN apt update

RUN apt-get -y install php7.4 php7.4-cli php7.4-common \
    php7.4-json php7.4-opcache php7.4-mysql \
    php7.4-zip php7.4-fpm php7.4-mbstring