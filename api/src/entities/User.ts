import { Entity, PrimaryGeneratedColumn, Column } from "typeorm"
import {
    Length,
    IsEmail,
    IsPhoneNumber,
    IsNotEmpty,
} from "class-validator"
import { EncryptionTransformer } from "typeorm-encrypted";
import { MyEncryptionTransformerConfig } from "../configurations/encryption-config";

@Entity()
export class User {

    @PrimaryGeneratedColumn()
    id: number;

    @Column({ type: "varchar", length: 150, nullable: false })
    @Length(150)
    @IsNotEmpty()
    name: string;

    @Column({ type: "varchar", length: 256, nullable: false, unique: true })
    @IsEmail()
    @Length(256)
    @IsNotEmpty()
    email: string;

    @Column({ default: true, nullable: false })
    @IsNotEmpty()
    active: boolean;

    @Column({
        type: "varchar",
        nullable: false,
        transformer: new EncryptionTransformer(MyEncryptionTransformerConfig)
    })
    @IsNotEmpty()
    password: string;

    @Column({ type: "varchar", length: 14, nullable: false })
    @IsPhoneNumber()
    @Length(14)
    @IsNotEmpty()
    phoneNumber: string;

    constructor(name: string, email: string, password: string, phoneNumber: string) {
        this.name = name;
        this.email = email;
        this.password = password;
        this.phoneNumber = phoneNumber;
        this.active = true;
    }

}
