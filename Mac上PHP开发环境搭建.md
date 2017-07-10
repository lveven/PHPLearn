#Mac上PHP开发环境搭建笔记

##搭建方式
- [Laravel Homestead](http://d.laravel-china.org/docs/5.4/homestead)
- [MAMP(收费)](https://www.mamp.info/en/downloads/)
- [XAMPP](https://www.apachefriends.org/index.html)

##搭建步骤
由于我们只需要PHP开发环境不使用Larvel框架，所以搭建过程中需要有所修改，具体步骤如下：

- 安装VirtualBox 5.1
- 安装Homestead Vagrant Box
    vagrant box add laravel/homestead
- 安装Homestead
    将Homestead的代码仓库克隆到本地目录下
    进入Homestead目录下，执行`bash init.sh`

- 配置Homestead
    Homestead.yaml 是homestead的配置文件

- 启动Vagrant Box
    启动命令`vagrant up`
    移除虚拟机命令`vagrant destroy --force`

通过ssh连接虚拟机 `vagrant ssh`

连接数据库 账号密码 `homestead/secret` 端口是33060（MySQL）

虚拟机 账号密码 `vagrant/vagrant`

增加更多网站

一旦 Homestead 环境配置完毕且成功运行后，你可能会想要为 Laravel 应用程序增加更多的 Nginx 网站。你可以在单个 Homestead 环境中运行多个 Laravel 程序。要添加额外的网站，只需将网站添加到您的 Homestead.yaml 文件中：

 sites:
    - map: homestead.app
      to: /home/vagrant/Code/
    - map: another.app
      to: /home/vagrant/Code/
如果 Vagrant 没有自动管理你的「hosts」文件，你可能需要手动把新增的站点加入到「hosts」文件中：

192.168.10.10  homestead.app
192.168.10.10  another.app


