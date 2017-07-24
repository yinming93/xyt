/* krpano 1.16.2 snow plugin (build 2013-04-12) */
var krpanoplugin=function(){function x(W,y){y=!0===y;if(g&&z){var l=f.get("view");if(!(null==l||null==l.r_rmatrix)){var u=z,n=g.width,r=g.height;u.clearRect(0,0,n,r);var b,w=1;switch(String(a.mode).toLowerCase()){case "snow":w=1;break;case "image":w=3}var m=a.flakes;f.ismobile&&1E3<m&&(m=1E3);f.istablet&&2E3<m&&(m=2E3);var s=a.color,G=1E3*a.floor,A=1E3*a.spreading,H=1*a.imagescale,c=1*a.speed,B=1*a.shake,x=1*a.speedvariance,C=1*a.wind,p=a.winddir*Math.PI/180;V!=s&&(q=null,V=s);if(null==q){q=document.createElement("canvas");
q.width=2;q.height=2;var D=q.getContext("2d");D.fillStyle="rgba("+(s>>16&255)+","+(s>>8&255)+","+(s&255)+",0.5)";D.fillRect(0,0,2,2)}var s=q,D=C*Math.cos(p),C=C*Math.sin(p),p=null,I=0,J=0;if(3==w){var k=a.imageurl;if(null==k||""==k)return;K!=k&&(t=null,K=k,t=new Image,t.src=f.parsePath(K));if(null==t)return;t&&t.complete&&(p=t,I=p.naturalWidth,J=p.naturalHeight);if(null==p)return}null==h&&(h=Array(3*m));if(!1==y&&m!=E){if(E<m)for(b=3*E;b<3*m;b+=3)h[0|b]=(Math.random()-0.5)*A,h[0|b+2]=(Math.random()-
0.5)*A,h[0|b+1]=-(Math.random()*(G+1500))+G;E=m}var n=0.5*n,k=0.5*r,L=Number(l.r_zoff);isNaN(L)&&(L=0);b=f.stagescale;r=l.r_zoom*r/f.stageheight/b;b=Math.max(4*f.stageheight/3,f.stagewidth)/b;H*=b*r/(2*k);b=l.r_rmatrix;var M,N,O,P,Q,R,S,T;b.hasOwnProperty("m11")?(l=b.m11,M=b.m12,N=b.m13,O=b.m21,P=b.m22,Q=b.m23,R=b.m31,S=b.m32,T=b.m33):(l=b[0],M=b[1],N=b[2],O=b[4],P=b[5],Q=b[6],R=b[8],S=b[9],T=b[10]);var v=1E3/(U+1)/122;0.5<v&&(v=0.5);var v=v*c,B=B*v,d,e,j,F;for(b=0;b<3*m;b+=3)c=h[0|b],d=h[0|b+1],
e=h[0|b+2],!1==y&&(d+=v*(10+Math.random()*x),d>G&&(c=(Math.random()-0.5)*A,e=(Math.random()-0.5)*A,d=1*(-1E3-500*Math.random())),c+=(Math.random()-0.5)*B+D,e+=(Math.random()-0.5)*B+C,2E3<c?c-=4100:-2E3>c&&(c+=4100),2E3<d?d-=4100:-2E3>d&&(d+=4100),h[0|b]=c,h[0|b+1]=d,h[0|b+2]=e),j=c,F=d,c=l*j+O*F+R*e,d=M*j+P*F+S*e,e=N*j+Q*F+T*e+L,10<e&&(1==w?(e=r/e,c*=e,d*=e,c>-n&&(c<+n&&d>-k&&d<k)&&(c+=n-1,d+=k-1,u.drawImage(s,c|0,d|0))):3==w&&(j=e,e=r/e,c*=e,d*=e,j=H/j,e=0.5*I*j,j*=0.5*J,c>-n-e&&(c<+n+e&&d>-k-j&&
d<k+j)&&(c+=n-e,d+=k-j,u.drawImage(p,0,0,I,J,c,d,e,j))))}}}var f=null,a=null,g=null,z=null,V=null,h=null,E=0,K=null,t=null,U=30,u=null,q=null;this.registerplugin=function(h,q,l){f=h;a=l;a.registerattribute("mode","snow");a.registerattribute("imageurl","");a.registerattribute("flakes",f.ismobile||f.istablet?1E3:4E3);a.registerattribute("color",16777215);a.registerattribute("floor",0.3);a.registerattribute("speed",1);a.registerattribute("spreading",4);a.registerattribute("shake",4);a.registerattribute("speedvariance",
2);a.registerattribute("wind",0);a.registerattribute("winddir",0);a.registerattribute("rainwidth",0.5);a.registerattribute("rainalpha",0.5);a.registerattribute("imagescale",1);a.enabled=!1;a.align="lefttop";a.edge="lefttop";a.width="100%";a.height="100%";a.x=0;a.y=0;a.registercontentsize(256,256);g=document.createElement("canvas");g.width=256;g.height=256;g.style.width="100%";g.style.height="100%";g.onselectstart=function(){return!1};z=g.getContext("2d");a.sprite.appendChild(g);if(f.ismobile||f.istablet)U=
15;u=setInterval(x,1E3/U);f.set("events["+a.name+"_snowevents].keep",a.keep);f.set("events["+a.name+"_snowevents].onviewchanged",function(){x(null,!0)})};this.unloadplugin=function(){try{clearInterval(u),f.set("events["+a.name+"_snowevents].keep",!1),f.set("events["+a.name+"_snowevents].onviewchanged",null),f.set("events["+a.name+"_snowevents].name",null),a.sprite.removeChild(g),f=a=g=z=u=null}catch(h){}};this.onresize=function(a,f){g&&(g.width=a>>0,g.height=f>>0);return!1}};
