import { User } from '../entity/User';

import { AppDataSource } from "../data-source";
import { IUserService } from './abstractions/IUserService';

const userRepository = AppDataSource.getRepository(User)

export class UserService implements IUserService {
    async save(user: User): Promise<User> {
        const savedUser = await userRepository.save(user);

        return savedUser;
    }

    async getAll(): Promise<User[]> {
        return await userRepository.find();
    }

    async getById(id): Promise<User> {
        return await userRepository.findOneBy({ id: id });
    }

    async deleteById(id) {
        const user = await userRepository.findOneBy({ id: id });

        await userRepository.delete(user);
    }

    async updateById(id, user: User): Promise<User> {
        const userDb = await userRepository.findOneBy({ id: id });

        userDb.name = user.name;
        userDb.email = user.email;
        userDb.active = user.active;

        return await userRepository.save(userDb);
    }
}