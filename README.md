# Orsum Ichnographiae II

Extended version of Orsum Ichnographiae. 

## Deployment

There is a Dockerfile and a script provided to build a docker container. Just call `./dockerize.sh` to run the build process.

After building, use a command like `docker run -d -p 80:80 --name orsum-ichnographiae orsum-ichnographiae:latest` to run the container.

If you are using nginx on your host computer, use a configuration like this to proxy pass requests to the container:

```nginx
http {
  upstream orsum-docker {
    server localhost:3001;
  }
  
  server {
    listen 80 default_server;
    server_name _;
    
    location /orsum/ {
      proxy_pass http://orsum-docker/;
      proxy_redirect     off;
      proxy_set_header   Host $host;
      proxy_set_header   X-Real-IP $remote_addr;
      proxy_set_header   X-Forwarded-For $proxy_add_x_forwarded_for;
      proxy_set_header   X-Forwarded-Host $server_name;
    }
  }
}
```

Using mysql in a different container is recommended but not used in the configuration provided. To use a different MySQL server, adapt the `ajaxResponder.pl` and `detailsResponder.pl` files.
