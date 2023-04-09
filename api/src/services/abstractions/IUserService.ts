import { User } from '../../entity/User';

export interface IUserService {

    save(user: User): Promise<User>;
    getAll(): Promise<User[]>;
    getById(id): Promise<User>;
    deleteById(id): void;
    updateById(id, user: User): Promise<User>;
}