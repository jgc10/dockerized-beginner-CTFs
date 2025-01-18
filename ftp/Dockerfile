FROM ubuntu:latest

# update and install packages
RUN apt update \
  && apt install -y \
  vsftpd \
  && apt clean

# add configuration file
COPY ./vsftpd.conf /etc/vsftpd.conf

# create ftp file directory
RUN mkdir -p /var/ftp

# add flag
RUN echo "CIT{3c59bd66677c2200376eaafaa4518cbb}" > /var/ftp/flag.txt

# open ports
EXPOSE 21 30000-30100

# run server
CMD ["/usr/sbin/vsftpd", "/etc/vsftpd.conf"]