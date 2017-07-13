### phan

This is a Docker container for etsy's static code analyzer phan.
With that, you can check your PHP code on the fly.

### Usage

Mount your code into the container to analyze it with phan.
Results will be printed to stdout.

    docker run -it --rm -v `pwd`:/code mre0/php-phan

*Note*: Only the code in the src folder will be analyzed for errors.
This way you can have a vendor directory next to your src folder which will be used for
namespace resolution. If you only want to analyze all files in the local folder,
change the mount command a little:

    docker run -it --rm -v `pwd`:/code/src mre0/php-phan

#### PHP代码静态扫描工具

```
用这个工具扫描了一下代码：https://github.com/etsy/phan

复制config.php(有各种配置)

修改Dockerflie

可以对run.sh进行修改， 设置哪些文件需要被扫描
#find /code -name '*.php' > filelist.txt
find /code/a/ -name '*.php' >> filelist.txt
find /code/b/ -name '*.php' >> filelist.txt
find /code/c/ -name '*.php' >> filelist.txt
find /code/d/ -name '*.php' >> filelist.txt

sudo docker build -t phan3.relaxed_analysis .

sudo docker run -it  -v /home/w/dev/flowerplus/flowerplus/:/code phan3.relaxed_analysis >phan.result1.relaxed_analysis
```
