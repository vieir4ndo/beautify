import { User } from '../../entities/User';

export interface IUserService {

    save(user: User): Promise<User>;
    getAll(): Promise<User[]>;
    getById(id: number): Promise<User>;
    softDeleteById(id: number): void;
    updateById(id: number, user: User): Promise<User>;
}