FROM ubuntu:24.04

# no interactive prompts
#ENV DEBIAN_FRONTEND=noninteractive

# update and install packages
RUN apt update \
  && apt install -y \
  sudo \
  openssh-server \
  build-essential \
  && apt clean

# ssh server config
RUN mkdir /var/run/sshd \
  && echo 'PermitRootLogin no' >> /etc/ssh/sshd_config \
  && echo 'PasswordAuthentication yes' >> /etc/ssh/sshd_config

# remove ubuntu user
RUN userdel -r ubuntu

# add users
RUN useradd -m -s /bin/bash cit \
  && echo 'cit:cit' | chpasswd \
  && chown -R root:root /home/cit \
  && chmod -R o=rx /home/cit

RUN useradd -m -s /bin/nologin jgc \
  && chmod -R o=rx /home/jgc

RUN useradd -s /bin/nologin walter

# inserting flags
COPY flags/flag.txt /home/cit
COPY flags/.hidden_flag.txt /home/cit
COPY flags/not_my_flag.txt /home/jgc

RUN mkdir -p /var/www/html
COPY flags/flag.bin /var/www/html

COPY flags/exec_me.sh /opt
RUN chmod 755 /opt/exec_me.sh

COPY flags/nested_directories /mnt/its_somewhere_in_here
RUN chmod -R 755 /mnt/its_somewhere_in_here \
  && chmod 644 /mnt/its_somewhere_in_here/Y33Ed7c3p7gYezXL/PBY1q57Q3vFoAblx/cL9TQ54viwdX80pZ

# allow connections from port 22
EXPOSE 22

# start ssh server
CMD ["/usr/sbin/sshd", "-D"]
