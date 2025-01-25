FROM ubuntu:24.04

# update and install packages
RUN apt update \
  && apt install -y \
  sudo \
  openssh-server \
  build-essential \
  iproute2 \
  netcat-traditional \
  && apt clean

# ssh server config
RUN mkdir /var/run/sshd \
  && echo 'PermitRootLogin no' >> /etc/ssh/sshd_config \
  && echo 'PasswordAuthentication yes' >> /etc/ssh/sshd_config

# remove ubuntu user
RUN userdel -r ubuntu

# add user that cannot edit the home directory
RUN useradd -m -s /bin/bash cit \
  && echo 'cit:cit' | chpasswd \
  && chown -R root:root /home/cit \
  && chmod -R o=rx /home/cit

# add other users
RUN useradd -m -s /bin/nologin tsoprano \
  && useradd -m -s /bin/nologin pgualtieri \
  && useradd -m -s /bin/nologin sdante \
  && useradd -m -s /bin/nologin cmoltisanti \
  && useradd -m -s /bin/nologin rbaccalieri \
  && useradd -m -s /bin/nologin jsacrimoni \
  && useradd -m -s /bin/nologin pleotardo

# add groups
RUN groupadd -f newyork \
  && groupadd -f northjersey \
  && groupadd -f boss \
  && gpasswd -M jsacrimoni,pleotardo newyork \
  && gpasswd -M tsoprano,pgualtieri,sdante,cmoltisanti,rbaccalieri northjersey \
  && gpasswd -M tsoprano,jsacrimoni boss

# sudoers
COPY flags /opt/satriales
RUN chown -R rbaccalieri:rbaccalieri /opt/satriales \
  && chmod -R 550 /opt/satriales \
  && chmod 555 /opt/satriales \
  && echo 'cit ALL=(rbaccalieri:rbaccalieri) NOPASSWD:/opt/satriales/veal parmasean' | tee /etc/sudoers.d/cit

# config
RUN echo '# IZnyZxXW0uT3isMQ' >> /etc/ssh/sshd_config

# log
RUN echo "Jan 10 15:45:09 citserver sshd[47341]: Failed password for root from 103.106.189.143 port 22 ssh2" >> /var/log/faillog

# start container
EXPOSE 22
CMD ["/usr/sbin/sshd", "-D"]
