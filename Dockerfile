FROM ubuntu:latest

LABEL maintainer="Murat muratsagmak01@gmail.com"

WORKDIR /app

RUN apt-get update && \
    apt-get install -y \
    wget \
    tar \
    gzip \
    gcc \
    make \
    && rm -rf /var/lib/apt/lists/*

COPY . /app

RUN echo "Merhaba, Dockerfile ile oluşturulan bir Ubuntu konteyneri!"

CMD ["echo", "Konteyner başlatıldı. Örnek bir komut çalıştırılıyor."]

EXPOSE 80 22
