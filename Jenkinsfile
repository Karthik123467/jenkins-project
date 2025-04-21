pipeline {
    agent any
    stages {
        stage('Clone Repository') {
            steps {
                script {
                    // Clone repository to the Jenkins workspace
                    sh 'git clone https://github.com/Karthik123467/php-docker-stack-demo.git project-clone8'
                }
            }
        }

        stage('Copy to Container') {
            steps {
                script {
                    // Copy the cloned repository into the project-copy2 container
                    sh 'docker cp project-clone8/. project-copy2:/'
                }
            }
        }

        stage('Run Docker Compose Up') {
            steps {
                script {
                    // Run docker-compose up inside the project-copy2 container
                    sh 'docker exec project-copy2 bash -c "docker-compose up"'
                }
            }
        }

        stage('Run Docker Compose Down') {
            steps {
                script {
                    // Run docker-compose down inside the project-copy2 container
                    sh 'docker exec project-copy2 bash -c "docker-compose down"'
                }
            }
        }
    }
}
