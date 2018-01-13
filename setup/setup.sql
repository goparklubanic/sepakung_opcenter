create database klubaner_desaApp;
create user klubaner_income@localhost identified by 'incomeSemarang_*';
grant all on klubaner_desaApp.* to klubaner_income@localhost with grant option;
flush privileges;
