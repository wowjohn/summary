FROM registry.cn-hangzhou.aliyuncs.com/jimu/php:7.4-alpine-v3.11-base

LABEL maintainer="jimu <1055441929@qq.com>" version="1.0" license="MIT"

ARG SWOOLE_VERSION

##
# ---------- env settings ----------
##
ENV SWOOLE_VERSION=${SWOOLE_VERSION:-"4.5.2"} \
    COMPOSER_VERSION=1.10.10\
    #  install and remove building packages
    PHPIZE_DEPS="autoconf dpkg-dev dpkg file g++ gcc libc-dev make php7-dev php7-pear pkgconf re2c pcre-dev pcre2-dev zlib-dev libtool automake"

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories

# update
RUN set -ex \
    && apk update \
    # for swoole extension libaio linux-headers
    && apk add --no-cache libstdc++ openssl openssh npm git bash \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS libaio-dev openssl-dev

    # download
RUN cd /tmp \
    && curl -SL "https://github.com/swoole/swoole-src/archive/v${SWOOLE_VERSION}.tar.gz" -o swoole.tar.gz \
    # php extension:swoole
    && cd /tmp \
    && mkdir -p swoole \
    && tar -xf swoole.tar.gz -C swoole --strip-components=1 \
    && ln -s /usr/bin/phpize7 /usr/local/bin/phpize \
    && ln -s /usr/bin/php-config7 /usr/local/bin/php-config \
    && ( \
        cd swoole \
        && phpize \
        && ./configure --enable-mysqlnd --enable-openssl --enable-http2 \
        && make -s -j$(nproc) && make install \
    ) \
    && echo "memory_limit=1G" > /etc/php7/conf.d/00_default.ini \
    && echo "extension=swoole.so" > /etc/php7/conf.d/swoole.ini \
    && echo "swoole.use_shortname = 'Off'" >> /etc/php7/conf.d/swoole.ini \
     # install composer
    && cd /tmp \
    && wget https://github.com/composer/composer/releases/download/${COMPOSER_VERSION}/composer.phar \
        && chmod u+x composer.phar \
        && mv composer.phar /usr/local/bin/composer \
 #  ---------- some config ----------
    && cd /etc/php7 \
    # - config PHP
    && { \
        echo "date.timezone=${TIMEZONE}"; \
    } | tee conf.d/99-overrides.ini \
    # - config timezone
    && ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
    && echo "${TIMEZONE}" > /etc/timezone \
    # clear
    && php --ri swoole \
    # ---------- clear works ----------
    && apk del .build-deps \
    && rm -rf /var/cache/apk/* /tmp/* /usr/share/man /usr/local/bin/php* \
    && echo -e "\033[42;37m Build Completed :).\033[0m\n"

# 安装supervisor
RUN apk add supervisor \
    && mkdir -p /var/log/supervisor

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY ./id_rsa_composer /root/.ssh/id_rsa
COPY ./known_hosts /root/.ssh/known_hosts

RUN chmod 600 /root/.ssh/id_rsa && chmod 644 /root/.ssh/known_hosts

WORKDIR /home/httpd

EXPOSE 9501 9502

CMD ["/usr/bin/supervisord"]