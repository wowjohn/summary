FROM atlassian/confluence-server:6.6 
ENV LOCAL_HOME   /var/atlassian/application-data/confluence
LABEL Name=confluence
WORKDIR /var/atlassian/confluence
ADD ./atlassian-extras-decoder-v2-3.2.jar ${CONFLUENCE_INSTALL_DIR}/confluence/WEB-INF/lib/atlassian-extras-decoder-v2-3.2.jar
COPY ./mysql-connector-java-5.1.34.jar ${CONFLUENCE_INSTALL_DIR}/confluence/WEB-INF/lib/
RUN chown -R ${RUN_USER}:${RUN_GROUP} ${CONFLUENCE_INSTALL_DIR}/confluence/WEB-INF/lib/atlassian-extras-decoder-v2-3.2.jar \
  && chown -R ${RUN_USER}:${RUN_GROUP} ${CONFLUENCE_INSTALL_DIR}/confluence/WEB-INF/lib/mysql-connector-java-5.1.34.jar
EXPOSE 8090
EXPOSE 8091  
ENTRYPOINT /entrypoint.sh -fg && while true; do sleep 30;done