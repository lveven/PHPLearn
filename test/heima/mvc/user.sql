create table usertable (
    id int auto_increment PRIMARY KEY,
    user_name varchar(20),
    edu varchar(40),
    xingqu set('篮球','足球','吹牛','弹琴','打扑克'),
    fromwhere varchar(20),
    reg_time datetime
);