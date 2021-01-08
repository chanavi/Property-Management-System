-- drop database miniproject;
create database miniproject;

use miniproject;
create table broker(
					broker_id int primary key,
                    broker_name varchar(20) NOT NULL,
                    email_id varchar(45) NOT NULL,
                    brokerpassword text NOT NULL
);

insert into broker values(101, 'Pratap Patil', 'pratapp12@gmail.com', 'Pratap'), 
						(102, 'Bablu Deshmukh', 'bablu12@gmail.com', 'Bablu'), 
						(103, 'Rana Singh', 'rana12@gmail.com', 'Rana');

create table broker_contact(
							broker_id int,
                            broker_contact_no bigint not null check (broker_contact_no between 1000000000 and 9999999999),
                            primary key(broker_id,broker_contact_no),
                            foreign key(broker_id) references broker(broker_id) on update cascade on delete cascade
);

insert into broker_contact values(101, 3256325632), (102, 4563214563), (103, 1478523698);
                     
create table consultant(
						cid INT(6) PRIMARY KEY,
						cname varchar(20) NOT NULL,
						ctype varchar(20) NOT NULL,
                        Email varchar(30) NOT NULL
);

INSERT INTO consultant (cid, cname, ctype,Email) VALUES(201, 'Niranj', 'Home Loan','Niranj@gmail.com'), 
												(202, 'Mukesh', 'Financial Consultant','Mukesh@gmail.com'),
												(203, 'Kamlesh', 'Pest Control','Kamlesh@gmail.com'),
                                                (204, 'Rajesh', 'Legal Services','Rajesh@gmail.com'),
                                                (205, 'John', 'Rental','John@gmail.com'),
                                                (206, 'Tom', 'Home Cleaning','Tom@gmail.com'),
                                                (207, 'Ravi', 'Vastu','Ravi@gmail.com'),
                                                (208, 'Komal', 'Design and Decor','Komal@gmail.com'),
                                                (209, 'Geet', 'Property Inspection','Geet@gmail.com'),
												(210, 'Satish', 'Sanitization','Satish@gmailcom');

create table con_contact(
							cid int,
                            con_contact_no bigint not null check (con_contact_no between 1000000000 and 9999999999),
                            primary key(cid,con_contact_no),
                            foreign key(cid) references consultant(cid) on update cascade on delete cascade
							
);

INSERT INTO con_contact VALUES (201, 9887546587),
							   (202, 9832213425), 
							   (203, 8214984545), 
                               (204, 9418562349), 
                               (205, 9987451596), 
                               (206, 9565542132), 
                               (207, 9865421392), 
                               (208, 8765542132), 
                               (209, 8565542132), 
							   (210, 9985429758);

create table prop_owner(
						owner_id int primary key,
                        owner_name varchar(20),
                        email_id varchar(45),
                        broker_id int,
                        foreign key(broker_id) references broker(broker_id) on update cascade on delete cascade
);

insert into prop_owner values (8001, "Pratap Kulkarni","Pratap@gmail.com",101),
							  (8002, "Manoj Kale","kale@gmail.com",103),
                              (8003, "Sudheer Shek","Sudher@gmail.com",102),
                              (8004, "Mehek Kumar","Kumarmehak@gmail.com",103),
                              (8005, "Yashami Joshi","Joshiyashmi@gmail.com",102),
                              (8006, "Ram Verma","vermaram@gmail.com",101);



create table owner_contact(
							owner_id int,
                            owner_contact_no bigint not null check (owner_contact_no between 1000000000 and 9999999999),
                            primary key(owner_id,owner_contact_no),
                            foreign key(owner_id) references prop_owner(owner_id) on update cascade on delete cascade
);


insert into owner_contact values (8001,7854126394),
								 (8001,9587412563),
                                 (8002,7458123694),
                                 (8003,7894561235),
                                 (8004,9568741236),
                                 (8005,9854216378),
                                 (8006,9857461321),
                                 (8006,8741259631);

create table seller(
					owner_id int primary key,
                    expected_price double,
					broker_id int,
                    foreign key(owner_id) references prop_owner(owner_id) on update cascade on delete cascade,
                    foreign key(broker_id) references broker(broker_id) on update cascade on delete cascade
);

insert into seller values (8001, 800000, 101),
							  (8002, 5000000 ,103),
                              (8003, 9000000 ,102);

create table landlord(
					owner_id int primary key,
                    expected_rent double,
					broker_id int,
                    foreign key(owner_id) references prop_owner(owner_id) on update cascade on delete cascade,
                    foreign key(broker_id) references broker(broker_id) on update cascade on delete cascade
);

insert into landlord values (8004,20000,103),
                              (8005,300000,102),
                              (8006, 230000,101);

                    

create table property(
						property_id int primary key,
                        location varchar(20),
                        established_date date,
                        owner_id int not null,
                        foreign key(owner_id) references prop_owner(owner_id) on update cascade on delete cascade
);

insert into property values (9001,"Kothrud","1999-03-26",8001),
							(9002,"Bhusari","2015-03-20",8002),
                            (9003,"Vimannagar","2003-04-06",8003),
                            (9004,"Baner","1993-03-06",8004),
                            (9005,"Bavdhan","1994-03-20",8005),
							(9006,"Aundh","2019-10-26",8006);

create table residential_property(
									property_id int primary key,
                                    house_no int,
                                    house_name varchar(20),
                                    bhk int,
                                    rate_per_sqft int,
                                    foreign key(property_id) references property(property_id) on update cascade on delete cascade
);

insert into residential_property values (9001,4005,"Green Clouds",3,6500),
										(9002,4006,"Rangers",5,7500),
                                        (9003,4007,"Nagari",2,4500);
                                      


create table commercial_property(
									property_id int primary key,
                                    shop_no int,
                                    building_name varchar(20),
                                    rate_per_sqft int,
                                    foreign key(property_id) references property(property_id) on update cascade on delete cascade
);

insert into commercial_property values (9004,5005,"Lunkad",5600),
									   (9005,5006,"Skymax",5050),
									   (9006,5007,"Galaxy",9600);
                                       
                                        
create table ammeneties(
						property_id int,
                        ammenities varchar(20),
                        primary key(property_id,ammenities)
);

insert into ammeneties values (9001,"Gym"),
						     (9001,"Pool"),
                             (9002,"Playground"),
                             (9003,"Amphi theatre"),
                             (9004,"AC"),
						     (9005,"Store Room"),
                             (9006,"Parking");
                             

create table services(
						property_id int,
                        close_by_services varchar(20),
						primary key(property_id,close_by_services)
);

insert into services values (9001,"School"),
						     (9001,"station"),
                             (9002,"Mall"),
                             (9003,"Airport"),
                             (9004,"IT sector"),
                             (9005,"Hospital"),
                             (9006,"Airport"); 

create table customer(
						cust_id int primary key,
                        cust_name varchar(20),
                        email_id varchar(45),
                        broker_id int,
                        cid int,
                        property_id int,
                        foreign key(broker_id) references broker(broker_id) on update cascade on delete cascade,
                        foreign key(cid) references consultant(cid) on update cascade on delete cascade,
                        foreign key(property_id) references property(property_id) on update cascade on delete cascade
);

insert into customer values (3006,"Pravin Shah","pravin@gmail.com",101,203,9001),
							(3007,"Govid Kulkarni","govid@gmail.com",103,202,9002),
                            (3008,"Sumeet Shinde","Suraj@gmail.com",102,201,9003),
                            (3009,"Sahil Shah","sahil@gmail.com",101,204,9004),
                            (3010,"Neha Puri","Puri@gmail.com",103,201,9005),
                            (3011,"Rahul Jaipuri","jaiPuri@gmail.com",103,202,9006);

create table cust_contact(
							cust_id int,
                            cust_contact_no bigint not null check (cust_contact_no between 1000000000 and 9999999999),
                            primary key(cust_id,cust_contact_no),
                            foreign key(cust_id) references customer(cust_id) on update cascade on delete cascade
);

insert into cust_contact values (3006,7412589631),
								(3007,9874561236),
								(3008,7458485691),
								(3009,8745912341),
								(3010,7589424563),
								(3011,8547695214);


create table buyer(
					cust_id int primary key,
					max_price double,
                    locality varchar(45),
                    broker_id int,
                    cid int,
                    foreign key(cust_id) references customer(cust_id) on update cascade on delete cascade,
                    foreign key(broker_id) references broker(broker_id) on update cascade on delete cascade,
					foreign key(cid) references consultant(cid) on update cascade on delete cascade
);

insert buyer values (3006,850000,"Kothrud",101,203),
						  (3007,750000,"Vimannager",103,202),
						  (3008,890000,"Paud Road",102,201);
                    
create table tenant(
					cust_id int primary key,
                    max_rent double,
                    locality varchar(45),
                    broker_id int,
                    cid int,
                    foreign key(cust_id) references customer(cust_id) on update cascade on delete cascade,
                    foreign key(broker_id) references broker(broker_id) on update cascade on delete cascade,
					foreign key(cid) references consultant(cid) on update cascade on delete cascade
);

insert tenant values (3009,18000,"Paud Road",101,204),
					 (3010,20000,"Baner",103,201),
					 (3011,22000,"Aundh",103,202);

alter table property add column cust_id int default null;
alter table property add foreign key(cust_id) references customer(cust_id) on update cascade on delete cascade;

create table registration(
							registration_id int primary key,
                            date_of_deal date,
                            owner_id int,
                            property_id int,
                            cust_id int
	);
                                
                     
CREATE TABLE maintable (
	user_id int primary key,
	name varchar(30) NOT NULL,
	email_id text NOT NULL,
	contact_no bigint not null check (contact_no between 1000000000 and 9999999999),
	password text NOT NULL
);

insert into maintable values (1700,'Pallavi','pallavi.udatewar@gmail.com',8830085025,'pallavi'),
							 (1701,'Rishabh','rishabh@gmail.com',8605010651,'rishabh'),
                             (1702,'Raj','Raj@gmail.com',1234567890,'raj');
                             

delimiter $
create procedure update_cust()
begin
declare cid int;
declare pid int;
declare done int default 0;
declare counter int default 0;
declare limit1 int;
declare c1 cursor for select cust_id, property_id from customer;
declare continue handler for not found set done = 1;
select count(cust_id) into limit1 from customer;

open c1;

while counter < limit1 do

fetch c1 into cid, pid;
update property set cust_id = cid where property_id = pid;

set counter = counter + 1;
end while;
end $

       
delimiter $
create trigger del_property after delete on property
for each row
begin
insert into registration values (old.property_id, current_date(), old.owner_id, old.property_id, old.cust_id);
end$


delimiter $
create trigger cancel_trans after update on property
for each row
begin
delete from customer where cust_id = old.cust_id;
delete from cust_contact where cust_id = old.cust_id;
end$

			