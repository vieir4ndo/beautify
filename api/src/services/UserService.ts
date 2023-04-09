import { User } from '../entity/User';

import { AppDataSource } from "../data-source";

const userRepository = AppDataSource.getRepository(User)

export class UserService {

    async save(user: User): Promise<User> {
        const savedUser = await userRepository.save(user);

        return savedUser;
    }
}