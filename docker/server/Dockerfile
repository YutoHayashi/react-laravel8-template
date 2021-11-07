FROM centos:8

RUN dnf update -y
RUN dnf install -y httpd && \
    dnf clean all

ADD vhost.conf /etc/httpd/conf.d
COPY httpd.conf /etc/httpd/conf/httpd.conf

WORKDIR /var/www/html

CMD [ "/usr/sbin/httpd", "-DFOREGROUND" ]
