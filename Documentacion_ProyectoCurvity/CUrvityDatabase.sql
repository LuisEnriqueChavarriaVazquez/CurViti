drop database if exists Curvity;
create database if not exists Curvity;
use Curvity;
create table if not exists Aspirante 
(IDAspirante varchar (30) primary key,nombre varchar(30),Contra varchar(30),ApellidoPat varchar(30),
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
NombreRelcutador varchar(30),CorreoElecReclutador varchar(30),ContraReclutador varchar(30),
NombreRedSocial1 varchar(30),NombreUsuarioRedSocial1 varchar(30),NombreRedSocial2 varchar(30),NombreUsuarioRedSocial2 varchar(30), 
NombreRedSocial3 varchar(30),NombreUsuarioRedSocial3 varchar(30),foreign key (IDEmpresa) references Empresa(IDEmpresa),
primary key (IDSede,IDEmpresa));

create table if not exists Puesto
(IDPuesto varchar(30),IDSede varchar(30),IDEmpresa varchar (30),Nombre varchar (30), 
PagoOfertado varchar(30),ModalidadPago varchar(30),ResumenRequisitos text,ResumenPrestaciones text,
foreign key (IDEmpresa) references Empresa(IDEmpresa),foreign key (IDSede) references Sede(IDSede),
primary key (IDPuesto,IDSede,IDEmpresa)) ;

create table if not exists AspiranteDominaIdioma
(IDAspirante varchar(30),IDIdioma varchar (30),Porcentaje float,
foreign key (IDAspirante) references Aspirante(IDAspirante),
foreign key (IDIdioma) references Idioma(IDIdioma),
primary key (IDAspirante,IDIdioma));

create table if not exists Matching
(IDAspirante varchar(30),IDPuesto varchar(30),IDSede varchar(30),IDEmpresa varchar(30),Situacion text,
foreign key (IDAspirante) references Aspirante(IDAspirante),
foreign key (IDPuesto) references Puesto(IDPuesto),
foreign key (IDSede) references Sede(IDSede),
foreign key (IDEmpresa) references Empresa(IDEmpresa),
primary key (IDAspirante,IDPuesto,IDSede));