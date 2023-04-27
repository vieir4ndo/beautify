import { Entity, PrimaryGeneratedColumn, Column } from "typeorm"

//decorator
@Entity()
export class User {

    @PrimaryGeneratedColumn()
    id: number;

    @Column({ type: "varchar", length: 150, nullable: false })
    name: string;

    @Column({ type: "varchar", length: 256, nullable: false, unique: true })
    email: string;

    @Column({ default: true, nullable: false })
    active: boolean;

    @Column({ type: "varchar", nullable: false })
    password: string;

    @Column({ type: "varchar", length: 14, nullable: false })
    phoneNumber: string;

    constructor(name: string, email: string, password: string, phoneNumber: string) {
        this.name = name;
        this.email = email;
        this.password = password;
        this.phoneNumber = phoneNumber;
        this.active = true;
    }

}
