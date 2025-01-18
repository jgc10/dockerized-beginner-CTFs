FROM ubuntu:latest

# update and install packages
RUN apt update \
  && apt install -y \
  samba \
  && apt clean

# add configuration file
COPY ./smb.conf /etc/samba/smb.conf

# create ftp file directory
RUN mkdir -p /shares/backups \
  && mkdir -p /shares/docs \
  && chmod -R 7777 /shares

# add flag
RUN echo "CIT{9cdc3675b7e13723a67c844afbf1d27a}" > /shares/docs/flag.txt

# open ports
EXPOSE 137/udp 138/udp 139 445

# run server
CMD smbd -F