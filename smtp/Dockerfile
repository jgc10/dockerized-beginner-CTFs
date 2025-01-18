FROM ubuntu:latest

# update and install packages
RUN apt update \
  && apt install -y \
  postfix mailutils \
  && apt clean

# add configuration file
#COPY ./main.cf /etc/postfix/main.cf

# add users
RUN useradd -s /bin/nologin barbara

# open ports
EXPOSE 25

# run server
CMD postfix start-fg