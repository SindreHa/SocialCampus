use application;
delimiter ::

drop procedure if exists newUser::
create procedure newUser (
	in p_username varchar(50),
    in p_password varchar(255),
    in p_email varchar(245)
)
begin
	declare v_nextnr smallint(6);
    select max(id) + 1 from user into v_nextnr;
    insert into bruker (id, username, password, email)
    values (v_nextnr, p_username, p_password, p_email);
end::
delimiter ;
    