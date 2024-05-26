FROM centos:latest

LABEL maintainer="Murat muratsagmak01@gmail.com"

WORKDIR /app

RUN yum update -y && \
    yum install -y \
    wget \
    tar \
    gzip \
    gcc \
    make \
    && yum clean all

COPY . /app

RUN echo "Merhaba, Dockerfile ile oluşturulan bir CentOS konteyneri!"

CMD ["echo", "Konteyner başlatıldı. Örnek bir komut çalıştırılıyor."]
