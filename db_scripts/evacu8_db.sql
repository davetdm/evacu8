
/**
    Configurations are permissions, i.e) ShaftA Config, will allow tags 
    assigned to it.

    Ask bonolo to deploy more than one configs
*/
CREATE DATABASE evacu8_db;  

create table configs(
    id int not null auto_increment,
    name varchar(128) not null default '', -- shaft1, shaft2, shaft3
    description varchar(215) not null default '',
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    unique(name)
);

insert into configs(id, name, description) 
values(1, 'TestConf1', ''), (2, 'TestConf2', '');

create table groups(
    id int not null auto_increment,
    name varchar(64) not null default 'EMPLOYEE', -- EMPLOYEE, VISITOR, CONTRACTOR
    description varchar(215) not null default '',
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    unique(name)
);

insert into groups(id, name, description)
values(1, 'EMPLOYEE', ''), (2, 'VISITOR', ''), (3, 'CONTRACTOR', '');

-- defines minimum/default configs per group
create table group_config (
    id int not null auto_increment,
    group_id int not null, -- 1, 1, 2, 3,
    config_id int not null, -- 1, 2, 2, 3
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (group_id) references groups(id),
    foreign key (config_id) references configs(id)
);

insert into group_config(id, group_id, config_id)
values(1, 1, 1), (2, 1, 2),
(3, 2, 1), (4, 2, 2),
(5, 3, 1), (6, 3, 2);

create table tags(
    id int not null auto_increment,
    
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id)
);

-- 1-to-1 between a tag and  a group; i.e) a tag can only be assigned to one group
create table tag_group (
    id int not null auto_increment,
    tag_id int not null,
    group_id int not null,
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (tag_id) references tags(id),
    foreign key (group_id) references groups(id)
);
/** 
    This will copy the default config of the group, to the Tag. This is so that
    we can revert to factory/default config

    utils::hasConfig($tag, "shaft1");
*/
create table tag_config (
    id int not null auto_increment,
    tag_id int not null,
    config_id int not null,
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (tag_id) references tags(id),
    foreign key (config_id) references configs(id)
);

create table person (
    id int not null auto_increment,
    type varchar(64) not null default 'EMPLOYEE', -- EMPLOYEE, VISITOR, CONTRACTOR
    first_name varchar(128) not null default '',
    last_name varchar(128) not null default '',
    id_passport varchar(128) not null default '',
    email varchar(215) not null default '',
    mobile varchar(16) not null default '',
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    unique(id_passport)
);

-- 1-to-1 between a tag and a person; i.e) a tag can only be assigned to one person
create table person_tag(
    id int not null auto_increment,
    tag_id int not null, -- 1
    person_id int null, -- 1
    date_added varchar(64) not null default '',
    date_deleted varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (tag_id) references tags(id),
    foreign key (person_id) references person(id)
);

/**
    the following three tables are not required for the MVP, however, this is to show how
    we can simulate inheritance or group mine usersper Person Object.
*/
create table employees (
    id int not null auto_increment,
    person_id int null,
    date_added varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (person_id) references person(id)
);

create table visitors (
    id int not null auto_increment,
    person_id int null,
    date_added varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (person_id) references person(id)
);

create table contractors (
    id int not null auto_increment,
    person_id int null,
    date_added varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (person_id) references person(id)
);

/**
    
*/
create table movements(
    id int not null auto_increment,
    person_id int null,
    timestamp varchar(64) not null default '',
    location varchar(64) not null default '',
    status varchar(64) not null default '',
    date_added varchar(64) not null default '',
    deleted tinyint(1) not null default 0,
    primary key(id),
    foreign key (person_id) references person(id)
);
