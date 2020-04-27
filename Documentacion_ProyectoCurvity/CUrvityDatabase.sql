drop database if exists Curvity;
create database if not exists Curvity;
use Curvity;
create table if not exists Aspirante 
(IDAspirante varchar (30) primary key,Nombre varchar(30),Contra varchar(30),ApellidoPat varchar(30),
ApellidoMat varchar(30),SueldoDeseado varchar(30),Calle varchar(30),Ciudad varchar (30),
Estado varchar(30), NivelAcademico varchar(30),CorreoElec varchar(30),ResumenExpPrevLab text,
ResumenHab text,NombreRedSocial1 varchar(30),NombreUsuarioRedSocial1 varchar(30),
NombreRedSocial2 varchar(30),NombreUsuarioRedSocial2 varchar(30),
NombreRedSocial3 varchar(30),NombreUsuarioRedSocial3 varchar(30),
NombreFotoPerfil varchar(50), DireccionFotoPerfil varchar(30));

create table if not exists Empresa
(IDEmpresa varchar(30) primary key, Nombre varchar (30),RazonSocial varchar(30), Contra varchar(30),
Calle varchar(30),Ciudad varchar (30),Estado varchar(30),Tipo varchar(30), Telefono varchar(30),
DireccionWeb varchar (30),NombreFotoLogo varchar(50), DireccionFotoLogo varchar(30),
NombreRedSocial1 varchar(30),NombreUsuarioRedSocial1 varchar(30),
NombreRedSocial2 varchar(30),NombreUsuarioRedSocial2 varchar(30),
NombreRedSocial3 varchar(30),NombreUsuarioRedSocial3 varchar(30));

create table if not exists Idioma
(IDIdioma varchar(30) primary key,Nombre varchar(30));

create table if not exists Sede
(IDSede varchar(30) ,IDEmpresa varchar (30),Nombre varchar (30), Telefono varchar(30),
NombreReclutador varchar(30),CorreoElecReclutador varchar(30),ContraReclutador varchar(30),
NombreRedSocial1 varchar(30),NombreUsuarioRedSocial1 varchar(30),NombreRedSocial2 varchar(30),NombreUsuarioRedSocial2 varchar(30), 
NombreRedSocial3 varchar(30),NombreUsuarioRedSocial3 varchar(30),foreign key (IDEmpresa) references Empresa(IDEmpresa) on update cascade on delete cascade,
primary key (IDSede,IDEmpresa));

create table if not exists Puesto
(IDPuesto varchar(30),IDSede varchar(30),IDEmpresa varchar (30),Nombre varchar (30), 
PagoOfertado varchar(30),ModalidadPago varchar(30),ResumenRequisitos text,ResumenPrestaciones text,
foreign key (IDEmpresa) references Empresa(IDEmpresa) on update cascade on delete cascade,
foreign key (IDSede) references Sede(IDSede) on update cascade on delete cascade,
primary key (IDPuesto,IDSede,IDEmpresa)) ;

create table if not exists AspiranteDominaIdioma
(IDAspirante varchar(30),IDIdioma varchar (30),Porcentaje float,
foreign key (IDAspirante) references Aspirante(IDAspirante) on delete cascade on update cascade,
foreign key (IDIdioma) references Idioma(IDIdioma) on delete cascade on update cascade,
primary key (IDAspirante,IDIdioma));

create table if not exists Matching
(IDAspirante varchar(30),IDPuesto varchar(30),IDSede varchar(30),IDEmpresa varchar(30),Situacion text,
foreign key (IDAspirante) references Aspirante(IDAspirante) on delete cascade on update cascade,
foreign key (IDPuesto) references Puesto(IDPuesto) on delete cascade on update cascade,
foreign key (IDSede) references Sede(IDSede) on delete cascade on update cascade,
foreign key (IDEmpresa) references Empresa(IDEmpresa) on delete cascade on update cascade,
primary key (IDAspirante,IDPuesto,IDSede,IDEmpresa));

insert into Aspirante
(IDAspirante,Nombre,Contra,ApellidoPat,ApellidoMat,SueldoDeseado,Calle,Ciudad,
Estado,NivelAcademico,CorreoElec,ResumenExpPrevLab,ResumenHab,NombreRedSocial1,NombreUsuarioRedSocial1,
NombreRedSocial2,NombreUsuarioRedSocial2,NombreRedSocial3,NombreUsuarioRedSocial3,NombreFotoPerfil,DireccionFotoPerfil)
 values 
 ("1","Rick","12345","Machorro","Vences","123.45","Norte 25","CDMX",
"CDMX","Superior","rick@gmail.com","Conserge","Amigable","Facebook","Rick 1",
"Twitter","Rick 2","Linkedin","Rick 3","Foto Rick","Direccion foto rick");
insert into Empresa 
(IDEmpresa,Nombre,RazonSocial,Contra,Calle,Ciudad,Estado,Tipo,Telefono,DireccionWeb,
NombreFotoLogo,DireccionFotoLogo,NombreRedSocial1,NombreUsuarioRedSocial1,
NombreRedSocial2,NombreUsuarioRedSocial2,NombreRedSocial3,NombreUsuarioRedSocial3)
 values
("1","Amazon","Comercio","12345","Norte 25","New York","New York","Comercial","134334","amazon@gmail",
"Logo Amazon","Direccion Logo Amazon","Facebook","Amazon 1",
"Twitter","Amazon 2","Linkedin","Amazon 3");

insert into Sede
(IDSede,IDEmpresa,Nombre,Telefono,NombreReclutador,CorreoElecReclutador,ContraReclutador,
NombreRedSocial1,NombreUsuarioRedSocial1,NombreRedSocial2,NombreUsuarioRedSocial2,
NombreRedSocial3,NombreUsuarioRedSocial3) values
("1","1","Amazon del Norte","1235678","Relcutador1","reclutador@gmail.com","123456",
"Facebook","Amazon norte 1","Twitter","Amazon Norte 2",
"LinkeDin","Amazon Norte 3");

insert into Puesto (IDPuesto,IDSede,IDEmpresa,Nombre,PagoOfertado,ModalidadPago,ResumenRequisitos,ResumenPrestaciones)
values("1","1","1","Gerente","123.56","Semanal","Serbueno","2 semanas de vacaciones al año");

insert into Idioma (IDIdioma,Nombre) values("1","Ingles");

insert into Matching (IDAspirante,IDPuesto,IDSede,IDEmpresa,Situacion) values("1","1","1","1","Complicada");

insert into AspiranteDominaIdioma(IDAspirante,IDIdioma,Porcentaje) values("1","1",13);
select * from Aspirante;
select * from Empresa;
select * from Sede;
select * from Puesto;
select * from Idioma;
select * from Matching;
select * from AspiranteDominaIdioma;