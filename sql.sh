read -p "mysql-username:" username
read -p "mysq-password:" password
mysql -u$username -p$password<<EOF
create database sites;
use sites;
create table func (fun_name varchar(15),fun_url varchar(100));
create database users;
use users;
create table notes (authkey varchar(15));
EOF
