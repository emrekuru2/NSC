create table nsca_alerts
(
    Alert_ID      int auto_increment
        primary key,
    Alert_Title   varchar(100) null,
    Alert_Content text         null,
    Alert_Status  varchar(10)  null
);

create table nsca_clubs
(
    ClubID      int auto_increment
        primary key,
    Name        varchar(64)  null,
    Website     varchar(128) null,
    Description varchar(512) null,
    Email       varchar(128) null,
    Phone       varchar(12)  null,
    Facebook    varchar(256) null,
    TeamImage   varchar(64)  null
);

create table nsca_competitiontype
(
    CompTypeID  int auto_increment
        primary key,
    Name        varchar(64)  null,
    Description varchar(512) null
);

create table nsca_competition
(
    CompetitionID   int auto_increment
        primary key,
    CompetitionName varchar(64)  null,
    Description     varchar(512) null,
    CompTypeID      int          null,
    YearRunning     int          null,
    constraint nsca_competition_nsca_competitiontype_CompTypeID_fk
        foreign key (CompTypeID) references nsca_competitiontype (CompTypeID)
            on update cascade on delete cascade
);

create table nsca_devprograms
(
    DevID       int auto_increment
        primary key,
    Name        varchar(64)  null,
    Duration    varchar(64)  null,
    Description varchar(512) null,
    Time        varchar(64)  null,
    Charges     varchar(64)  null,
    Type        varchar(64)  null,
    DaysRun     varchar(64)  null
);

create table nsca_location
(
    LocationID  int auto_increment
        primary key,
    Name        varchar(64)  null,
    Address     varchar(64)  null,
    Description varchar(512) null
);

create table nsca_news
(
    NewsID    int auto_increment
        primary key,
    Title     varchar(128) null,
    FirstName varchar(64)  null,
    LastName  varchar(64)  null,
    Email     varchar(64)  null,
    Date      datetime     null,
    Content   text         null,
    Pictures  text         null,
    Videos    text         null
);

create table nsca_roletype
(
    RoleID      int auto_increment
        primary key,
    Name        varchar(64)  null,
    Description varchar(256) null
);

create table nsca_subcommittees
(
    SubID       int auto_increment
        primary key,
    Name        varchar(64)  null,
    Description varchar(512) null,
    Years       varchar(32)  null
);

create table nsca_teams
(
    TeamID int auto_increment
        primary key,
    ClubID int null,
    CompID int null,
    constraint ncsa_teams_nsca_clubs_ClubID_fk
        foreign key (ClubID) references nsca_clubs (ClubID)
            on update cascade on delete cascade,
    constraint ncsa_teams_nsca_competition_CompetitionID_fk
        foreign key (CompID) references nsca_competition (CompetitionID)
            on update cascade on delete cascade
);

create table nsca_user
(
    UserID          int auto_increment
        primary key,
    email           varchar(128) null,
    UserRole        varchar(64)  null,
    FirstName       varchar(32)  null,
    MiddleName      varchar(64)  null,
    LastName        varchar(32)  null,
    StreetAddress   varchar(64)  null,
    City            varchar(64)  null,
    Province        varchar(64)  null,
    Country         varchar(64)  null,
    PostalCode      varchar(6)   null,
    Phone           varchar(10)  null,
    UserDate        varchar(64)  null,
    imgFolder       varchar(128) null,
    UserDescription varchar(512) null
);

create table nsca_locationuser
(
    LocUserID  int auto_increment
        primary key,
    LocationID int null,
    UserID     int null,
    constraint nsca_LocationUser_nsca_location_LocationID_fk
        foreign key (LocationID) references nsca_location (LocationID)
            on update cascade on delete cascade,
    constraint nsca_LocationUser_nsca_user_UserID_fk
        foreign key (UserID) references nsca_user (UserID)
            on update cascade on delete cascade
);

create table nsca_login
(
    LoginID  int auto_increment
        primary key,
    email    varchar(64)  null,
    password varchar(256) null,
    UserID   int          null,
    constraint nsca_login_nsca_user_UserID_fk
        foreign key (UserID) references nsca_user (UserID)
            on update cascade on delete cascade
);

create table nsca_subuser
(
    SubUserID int auto_increment
        primary key,
    SubID     int           null,
    UserID    int           null,
    IsLead    int default 0 null,
    constraint nsca_subuser_nsca_subcommittees_SubID_fk
        foreign key (SubID) references nsca_subcommittees (SubID)
            on update cascade on delete cascade,
    constraint nsca_subuser_nsca_user_UserID_fk
        foreign key (UserID) references nsca_user (UserID)
            on update cascade on delete cascade
);

create table nsca_teamuser
(
    TeamUserID    int auto_increment
        primary key,
    UserID        int           null,
    TeamID        int           null,
    isClubManager int default 0 null,
    isTeamCaptain int default 0 null,
    isViceCaptain int default 0 null,
    waitingToJoin int default 1 null,
    constraint nsca_teamUser_ncsa_teams_TeamID_fk
        foreign key (TeamID) references nsca_teams (TeamID)
            on update cascade on delete cascade,
    constraint nsca_teamUser_nsca_user_UserID_fk
        foreign key (UserID) references nsca_user (UserID)
            on update cascade on delete cascade
);

create table nsca_userroles
(
    UserRoleID int auto_increment
        primary key,
    RoleID     int null,
    UserID     int null,
    constraint nsca_userroles_nsca_roletype_RoleID_fk
        foreign key (RoleID) references nsca_roletype (RoleID)
            on update cascade on delete cascade,
    constraint nsca_userroles_nsca_user_UserID_fk
        foreign key (UserID) references nsca_user (UserID)
            on update cascade on delete cascade
);

create table nsca_devroleuser
(
    DevRoleUserID int auto_increment
        primary key,
    DevID         int           null,
    UserID        int           null,
    IsLead        int default 0 null,
    constraint DevRoleUser_nsca_devprograms_DevID_fk
        foreign key (DevID) references nsca_devprograms (DevID)
            on update cascade on delete cascade,
    constraint nsca_devroleuser_nsca_userroles_UserID_fk
        foreign key (UserID) references nsca_userroles (UserID)
            on update cascade on delete cascade
);

